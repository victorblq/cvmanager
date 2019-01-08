import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material';
import { ProfessionalExperience } from '../../../entity/professional-experience';
import { TranslateService } from '@ngx-translate/core';
import { NotificationService } from '../../../services/notification.service';

@Component({
    selector: 'professional-experience-form',
    templateUrl: 'professional-experience-form.component.html'
})

export class ProfessionalExeperienceFormComponent implements OnInit {
    
    public titleText: string;
    public professionalExperience: ProfessionalExperience;

    constructor(
        @Inject(MAT_DIALOG_DATA) public data: any,
        private dialogRef: MatDialogRef<ProfessionalExeperienceFormComponent>,
        private translateService: TranslateService,
        private notificationService: NotificationService
    ) { 
        console.log(this.data);
        if(data.professionalExperience != null){
            this.professionalExperience = data.professionalExperience;
            this.translateService.get('professional-experience.edit-professional-experience').subscribe((editProfessionalExperienceText) => {
                this.titleText = editProfessionalExperienceText;
            });
        } else {
            this.professionalExperience = new ProfessionalExperience();
            this.translateService.get('professional-experience.add-professional-experience').subscribe((addProfessionalExperienceText) => {
                this.titleText = addProfessionalExperienceText;
            });
        }
    }

    ngOnInit() { }

    close(form, response){
        if(form != null){
            if(form.checkValidity()){
                this.dialogRef.close(response);
            }else{
                this.translateService.get('graduation.fill-required-fields').subscribe((errorText) => {
                    this.notificationService.showNotification('top', 'right', 'danger', errorText);
                });
            }
        }else{
            this.dialogRef.close(response);
        }
    }
}