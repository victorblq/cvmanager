import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './cvmanager/home/home.component';
import { AuthGuardService } from './services/auth-guard.service';
import { AdminComponent } from './admin/admin.component';
import { AdminHomeComponent } from './admin/home/admin-home.component';
import { PersonalInfoComponent } from './admin/personal-info/personal-info.component';
import { GraduationComponent } from './admin/graduation/graduation.component';
import { ProfessionalExperienceComponent } from './admin/professional-experience/professional-experience.component';
import { ProjectsComponent } from './admin/projects/projects.component';

const routes: Routes = [
    {
        path: "",
        component: HomeComponent,
        pathMatch: 'full'
    },
    {
        path: "admin",
        canActivate: [AuthGuardService],
        component: AdminComponent,
        children:[
            {
                path: "dashboard",
                component: AdminHomeComponent
            },
            {
                path: "personal-info",
                component: PersonalInfoComponent
            },
            {
                path: "graduation",
                component: GraduationComponent
            },
            {
                path: "professional-experience",
                component: ProfessionalExperienceComponent
            },
            {
                path: "projects",
                component: ProjectsComponent
            }
        ]
    }
];

@NgModule({
  imports: [RouterModule.forRoot(routes, {useHash: true})],
  exports: [RouterModule]
})
export class AppRoutingModule { }