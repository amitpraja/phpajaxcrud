from django.shortcuts import render,redirect
from django.http import HttpResponseRedirect
from django.views.generic import View,DetailView
from testapp.form import SignupForm,LoginForm
from django.contrib.auth import authenticate,login
from django.contrib import messages
from django.contrib.auth.decorators import login_required
from django.utils.decorators import method_decorator
from testapp.models import Course,Question
from testapp import models

from django.db.models import Q


# Create your views here.

def home_view(request):
    corse = Course.objects.all()
    print(corse)
    return render(request,'testapp/home.html',{'corse':corse})

class signup_view(View):
    def get(self,request):
        form = SignupForm()
        return render(request,'testapp/signup.html',{'form':form})

    def post(self,request):
        form = SignupForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request,'Sign Up success')
            return redirect('/login')
        else:
            return render(request,'testapp/signup.html',{'form':form})


class login_view(View):

    def get(self, request):
        fm = LoginForm()
        return render(request,'registration/login.html',{'form':fm})

    def post(self,request):
        fm = LoginForm(request,data=request.POST)
        if fm.is_valid():
            username = fm.cleaned_data['username']
            password = fm.cleaned_data['password']

            user = authenticate(request, username=username, password=password)
            if user is not None:
                login(request,user)
                return redirect('/')
            else:
                return render(request,'testapp/login.html',{'form':fm})

        else:
            return render(request,'testapp/login.html',{'form':fm})


class rules_view(View):
    def get(self,request,pk):
        mod = Course.objects.get(id=pk)
        total_quest = Question.objects.all().filter(course=mod).count()
        question = Question.objects.all().filter(course=mod)
        print(question)
        total_marks = 0
        for i in question:
            total_marks = total_marks+i.marks
        return render(request,'testapp/rules.html',{'model':mod,'total_quest':total_quest,'total_marks':total_marks})


class Exam_view(View):
    def get(self,request,pk):
        course = Course.objects.get(id=pk)
        question = Question.objects.all().filter(course=course)
        if request.method == 'POST':
            pass
        response = render(request,'testapp/exam.html',{'course':course,'question':question})
        response.set_cookie('course_id',course.id)
        print(question)
        return response

def calculate_marks(request):
    if request.COOKIES.get('course_id') is not None:
        course_id = request.COOKIES.get('course_id')
        course = Course.objects.get(id=course_id)
        total = 0

        question = Question.objects.all().filter(course=course)
        for i in range(len(question)):
                selected_ans = request.COOKIES.get(str(i+1))
                actual_answer = question[i].answer
                print(selected_ans)
                if selected_ans == actual_answer:
                    total = total + question[i].marks
                    print(total)
        return HttpResponseRedirect('/result')

def view_result(request):
    courses = Course.objects.all()
    return render(request,'testapp/view_result.html',{'courses':courses})
