from django.db import models
from django.urls import reverse

# Create your models here.
class Course(models.Model):
    course_name = models.CharField(max_length=100)
    ques_no = models.PositiveIntegerField()
    total_marks = models.PositiveIntegerField()


    def __str__(self):
        return self.course_name

class Question(models.Model):
    course = models.ForeignKey(Course,on_delete=models.CASCADE)
    marks = models.PositiveIntegerField()
    question = models.CharField(max_length=500)
    option1 = models.CharField(max_length=100)
    option2 = models.CharField(max_length=100)
    option3 = models.CharField(max_length=100)
    option4 = models.CharField(max_length=100)
    select = (('option1','option1'),('option2','option2'),('option3','option3'),('option4','option4'))
    answer = models.CharField(max_length=100,choices=select)
