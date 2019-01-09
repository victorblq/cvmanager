import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material';
import { TranslateService } from '@ngx-translate/core';
import { NotificationService } from '../../../services/notification.service';
import { Project } from '../../../entity/project';

@Component({
    selector: 'projects-form',
    templateUrl: 'projects-form.component.html'
})

export class ProjectsFormComponent implements OnInit {
    
    public titleText: string;
    public project: Project;
    public image: FormData;
    public imageChanged = false;

    constructor(
        @Inject(MAT_DIALOG_DATA) public data: any,
        private dialogRef: MatDialogRef<ProjectsFormComponent>,
        private translateService: TranslateService,
        private notificationService: NotificationService
    ) { 
        if(data.project.id != null){
            this.project = data.project;
            this.translateService.get('projects.edit-project').subscribe((editProjectText) => {
                this.titleText = editProjectText;
            });
        } else {
            this.project = new Project();
            this.translateService.get('projects.add-project').subscribe((addProjectText) => {
                this.titleText = addProjectText;
            });
        }
    }

    ngOnInit() { }

    close(form, response){
        if(form != null){
            if(form.checkValidity()){
                let responseObj = {project: response, image: null};

                if(this.imageChanged){
                    responseObj.image = this.image;
                }

                this.dialogRef.close(responseObj);
            }else{
                this.translateService.get('fill-required-fields').subscribe((errorText) => {
                    this.notificationService.showNotification('top', 'right', 'danger', errorText);
                });
            }
        }else{
            this.dialogRef.close({project: response, image: this.image});
        }
    }

    /**
     * Image
     */
    previewImage(event){
        let input = event.target;

        this.image = new FormData();
        this.image.append('image', input.files[0]);
        this.imageChanged = true;

        this.project.image = input.files[0].name;
    }

    getImageName(imagePath){
        let imageName = imagePath.split("/");
        return imageName[imageName.length - 1];
    }
}