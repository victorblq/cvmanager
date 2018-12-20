import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './cvmanager/home/home.component';
import { AuthGuardService } from './services/auth-guard.service';

const routes: Routes = [
    {
        path: "",
        component: HomeComponent,
        pathMatch: 'full'
    },
    {
        path: "admin",
        canActivate: [AuthGuardService],
        loadChildren: './admin/admin.module#AdminModule' 
    }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }