import { Component, OnInit } from '@angular/core';
import { AdminComponent } from '../admin.component';
import { TranslateService } from '@ngx-translate/core';
import { GraduationService } from '../../services/graduation.service';
import { Graduation } from '../../entity/graduation';
import { MatDialog } from '@angular/material';
import { GraduationFormComponent } from './form/graduation-form.component';
import { NotificationService } from '../../services/notification.service';

@Component({
    selector: 'graduation',
    templateUrl: 'graduation.component.html'
})

export class GraduationComponent implements OnInit {

    public graduations: Array<Graduation>;

    constructor(
        private translateService: TranslateService,
        public adminComponent: AdminComponent,
        private graduationService: GraduationService,
        private dialogService: MatDialog,
        private notificationService: NotificationService
    ) { 
        translateService.get('graduation.page-title').subscribe((pageTitle) => {
            adminComponent.pageTitle = pageTitle;
        });
    }

    ngOnInit() { 
        this.graduationService.listGraduations()
        .then((result: Array<Graduation>) => {
            this.graduations = result;
        })
    }

    public openGraduationForm(graduation) {
        let formDialogRef = this.dialogService.open(GraduationFormComponent, {
            minWidth: '40%',
            data:{
                graduation: Object.assign({}, graduation)
            },
            disableClose: true
        });

        formDialogRef.afterClosed().subscribe((result) => {
            if(result != null){
                if(result.id != null){
                    // this.updateGraduation();
                }else{
                    this.insertGraduation(result);
                }
            }
        });
    }

    public insertGraduation(graduation){
        this.graduationService.insertGraduation(graduation)
        .then((result: Graduation) => {
            this.graduations.push(graduation);

            this.translateService.get('graduation.graduation-saved').subscribe((referenceSavedText) => {
                this.notificationService.showNotification('top', 'right', 'success', referenceSavedText);
            });
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });;
    }
}