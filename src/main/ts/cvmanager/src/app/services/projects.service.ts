import { Injectable } from '@angular/core';
import { AbstractService } from './abstract.service';
import { Project } from '../entity/project';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class ProjectsService extends AbstractService<Project>{

    constructor(
        public http: HttpClient
    ) { 
        super(http);
        this.url = "projects";
    }

    public insertProject(project: Project): Promise<Project>{
        return this.http.post<Project>(this.url, project).toPromise<Project>();
    }

    public updateImage(projectId, image){
        return this.http.put<Project>(`${this.url}/image/${projectId}`, image).toPromise<Project>();
    }
}