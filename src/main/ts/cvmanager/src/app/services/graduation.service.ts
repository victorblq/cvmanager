import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Graduation } from '../entity/graduation';
import { AbstractService } from './abstract.service';

@Injectable()
export class GraduationService extends AbstractService<Graduation>{

    constructor(
        public http: HttpClient
    ) { 
        super(http);
        this.url = "graduation";
    }

    public listGraduationStatus(): Promise<Array<string>>{
        return this.http.get<Array<string>>(`${this.url}/graduation_status`).toPromise<Array<string>>();
    }
}