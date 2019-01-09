import { Component, OnInit } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
import { MatDialog } from '@angular/material';
import { AdminComponent } from '../admin.component';
import { NotificationService } from '../../services/notification.service';
import { ProjectsService } from '../../services/projects.service';
import { Project } from '../../entity/project';
import { ProjectsFormComponent } from './form/projects-form.component';

@Component({
    selector: 'projects',
    templateUrl: 'projects.component.html'
})

export class ProjectsComponent implements OnInit {
    public projects: Array<Project>;

    constructor(
        private translateService: TranslateService,
        private projectsService: ProjectsService,
        private dialogService: MatDialog,
        public adminComponent: AdminComponent,
        private notificationService: NotificationService
    ) { 
        translateService.get('projects.projects').subscribe((pageTitle) => {
            adminComponent.pageTitle = pageTitle;
        });
    }

    ngOnInit() { 
        this.projectsService.list()
        .then((result: Array<Project>) => {
            this.projects = result;
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
    }

    public openProjectsForm(project) {
        let formDialogRef = this.dialogService.open(ProjectsFormComponent, {
            minWidth: '40%',
            data:{
                project: Object.assign({}, project)
            },
            disableClose: true
        });

        formDialogRef.afterClosed().subscribe((result) => {
            if(result != null){
                if(result.project != null && result.project.id != null){
                    this.updateProject(result);
                }else{
                    this.insertProject(result);
                }
            }
        });
    }

    public insertProject(result){
        this.projectsService.insertProject(result.project)
        .then((project: Project) => {
            this.projectsService.updateImage(project.id, result.image)
            .then((result: Project) => {
                this.translateService.get('projects.project-saved').subscribe((referenceSavedText) => {
                    this.notificationService.showNotification('top', 'right', 'success', referenceSavedText);
                });
    
                this.projects.push(result);
            })
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
    }

    public updateProject(result){
        this.projectsService.insertProject(result.project)
        .then((project: Project) => {
            if(result.image != null){
                this.projectsService.updateImage(project.id, result.image)
                .then((result: Project) => {
                    let projectToRemove = this.projects.find((graduationToFind) => {
                        return graduationToFind.id == result.id;
                    });
                    
                    this.projects.splice(this.projects.indexOf(projectToRemove), 1, result);
    
                    this.translateService.get('projects.project-saved').subscribe((referenceSavedText) => {
                        this.notificationService.showNotification('top', 'right', 'success', referenceSavedText);
                    });
                })
            }else{
                let projectToRemove = this.projects.find((graduationToFind) => {
                    return graduationToFind.id == result.id;
                });
                
                this.projects.splice(this.projects.indexOf(projectToRemove), 1, project);

                this.translateService.get('projects.project-saved').subscribe((referenceSavedText) => {
                    this.notificationService.showNotification('top', 'right', 'success', referenceSavedText);
                });
            }
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
    }

    public deleteProject(project){
        this.projectsService.delete(project.id)
        .then((result) => {
            this.projects.splice(this.projects.indexOf(project), 1);
        }) 
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
    }
}