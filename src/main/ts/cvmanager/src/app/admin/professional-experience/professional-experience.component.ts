import { Component, OnInit } from '@angular/core';
import { AdminComponent } from '../admin.component';
import { TranslateService } from '@ngx-translate/core';
import { MatDialog } from '@angular/material';
import { ProfessionalExeperienceFormComponent } from './form/professional-experience-form.component';
import { ProfessionalExperienceService } from '../../services/professional-experience.service';
import { NotificationService } from '../../services/notification.service';
import { ProfessionalExperience } from '../../entity/professional-experience';

@Component({
    selector: 'professional-experience',
    templateUrl: 'professional-experience.component.html'
})

export class ProfessionalExperienceComponent implements OnInit {
    
    public professionalExperiences: Array<ProfessionalExperience>;

    constructor(
        private translateService: TranslateService,
        private dialogService: MatDialog,
        public adminComponent: AdminComponent,
        private professionalExperienceService: ProfessionalExperienceService,
        private notificationService: NotificationService
    ) { 
        translateService.get('professional-experience.professional-experience').subscribe((pageTitle) => {
            adminComponent.pageTitle = pageTitle;
        });
    }

    ngOnInit() { 
        this.professionalExperienceService.listProfessionalExperience()
        .then((result: Array<ProfessionalExperience>) => {
            this.professionalExperiences = result;
        })
    }

    public openProfessionalExperienceForm(professionalExperience) {
        let formDialogRef = this.dialogService.open(ProfessionalExeperienceFormComponent, {
            minWidth: '40%',
            data:{
                professionalExperience: Object.assign({}, professionalExperience)
            },
            disableClose: true
        });

        formDialogRef.afterClosed().subscribe((result) => {
            if(result != null){
                if(result.id != null){
                    this.updateProfessionalExperience(result);
                }else{
                    this.insertProfessionalExperience(result);
                }
            }
        });
    }

    public insertProfessionalExperience(professionalExperience){
        this.professionalExperienceService.insertProfessionalExperience(professionalExperience)
        .then((result: ProfessionalExperience) => {
            this.professionalExperiences.push(result);

            this.translateService.get('professional-experience.professional-experience-saved').subscribe((referenceSavedText) => {
                this.notificationService.showNotification('top', 'right', 'success', referenceSavedText);
            });
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
    }

    public updateProfessionalExperience(professionalExperience){
        this.professionalExperienceService.updateProfessionalExperience(professionalExperience)
        .then((result: ProfessionalExperience) => {
            this.professionalExperiences.push(result);

            this.translateService.get('professional-experience.professional-experience-saved').subscribe((referenceSavedText) => {
                this.notificationService.showNotification('top', 'right', 'success', referenceSavedText);
            });
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
    }

}