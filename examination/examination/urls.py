"""examination URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/4.1/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path,include
from django.contrib.auth.views import LogoutView
from testapp import views
from django.contrib.auth.decorators import login_required


urlpatterns = [
    path('admin/', admin.site.urls),
    path('', views.home_view),
    path('accounts/',include('django.contrib.auth.urls')),
    path('signup/', views.signup_view.as_view()),
    path('login/', views.login_view.as_view()),
    path('logout/', LogoutView.as_view(next_page='/')),
    path('<int:pk>/rules',login_required(views.rules_view.as_view()),name='rules'),
    path('<int:pk>/exam', views.Exam_view.as_view(),name='exam'),
    path('calculate/',views.calculate_marks),
    path('result/',views.view_result)


]
