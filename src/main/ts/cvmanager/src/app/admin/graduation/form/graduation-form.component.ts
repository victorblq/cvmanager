import { Component, OnInit, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material';
import { Graduation } from '../../../entity/graduation';
import { TranslateService } from '@ngx-translate/core';
import { GraduationService } from '../../../services/graduation.service';
import { NotificationService } from '../../../services/notification.service';

@Component({
    selector: 'graduation-form',
    templateUrl: 'graduation-form.component.html'
})
export class GraduationFormComponent implements OnInit {

    public title: string;
    public graduation: Graduation;
    public graduationStatus: Array<string>;

    constructor(
        @Inject(MAT_DIALOG_DATA) public data: any,
        private dialogRef: MatDialogRef<GraduationFormComponent>,
        private translateService: TranslateService,
        private graduationService: GraduationService,
        private notificationService: NotificationService
    ) { 
        if(data.graduation != null){
            this.graduation = data.graduation;
            this.translateService.get('graduation.edit-graduation').subscribe((editGraduationText) => {
                this.title = editGraduationText;
            });
        } else {
            this.graduation = new Graduation();
            this.translateService.get('graduation.add-graduation').subscribe((addGraduationText) => {
                this.title = addGraduationText;
            });
        }
    }

    ngOnInit() { 
        this.graduationService.listGraduationStatus()
        .then((result: Array<string>) => {
            this.graduationStatus = result;
        });
    }

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