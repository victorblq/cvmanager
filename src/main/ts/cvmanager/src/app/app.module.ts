import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule, CUSTOM_ELEMENTS_SCHEMA, ComponentRef } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpClient, HttpClientModule } from '@angular/common/http';

import { TranslateModule, TranslateLoader } from '@ngx-translate/core';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';

import { MatInputModule, MatIconModule, MatButtonModule, MatDialogModule, MatSelectModule, MatNativeDateModule, MatDatepickerModule } from "@angular/material";

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './cvmanager/home/home.component';
import { AdminComponent } from './admin/admin.component';
import { NavbarComponent } from './admin/components/navbar/navbar.component';
import { SidebarComponent } from './admin/components/sidebar/sidebar.component';
import { PersonalInfoComponent } from './admin/personal-info/personal-info.component';
import { AdminHomeComponent } from './admin/home/admin-home.component';
import { GraduationComponent } from './admin/graduation/graduation.component';
import { UserMenuComponent } from './admin/components/navbar/user-menu/user-menu.component';
import { PersonalInfoService } from './services/personal-info.service';
import { GraduationService } from './services/graduation.service';
import { NotificationService } from './services/notification.service';
import { GraduationFormComponent } from './admin/graduation/form/graduation-form.component';
import { ProfessionalExperienceComponent } from './admin/professional-experience/professional-experience.component';
import { ProfessionalExeperienceFormComponent } from './admin/professional-experience/form/professional-experience-form.component';
import { ProfessionalExperienceService } from './services/professional-experience.service';

export function HttpLoaderFactory(http: HttpClient) {
    return new TranslateHttpLoader(http);
}

@NgModule({
    declarations: [
        AppComponent,
        HomeComponent,
        
        AdminComponent,
        AdminHomeComponent,
        UserMenuComponent,
        NavbarComponent,
        SidebarComponent,
        PersonalInfoComponent,
        GraduationComponent,
        GraduationFormComponent,
        ProfessionalExperienceComponent,
        ProfessionalExeperienceFormComponent
    ],
    imports: [
        BrowserModule,
        BrowserAnimationsModule,
        AppRoutingModule,
        FormsModule,
        MatInputModule,
        MatIconModule,
        MatDatepickerModule,
        MatNativeDateModule,
        MatDialogModule,
        MatButtonModule,
        MatSelectModule,
        HttpClientModule,
        TranslateModule.forRoot({
            loader: {
                provide: TranslateLoader,
                useFactory: HttpLoaderFactory,
                deps: [HttpClient]
            }
        })
    ],
    providers: [
        PersonalInfoService,
        GraduationService,
        NotificationService,
        ProfessionalExperienceService
    ],
    entryComponents:[
        GraduationFormComponent,
        ProfessionalExeperienceFormComponent
    ],
    schemas: [CUSTOM_ELEMENTS_SCHEMA],
    bootstrap: [AppComponent]
})
export class AppModule { }