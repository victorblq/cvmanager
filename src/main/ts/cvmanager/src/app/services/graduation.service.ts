import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Graduation } from '../entity/graduation';

@Injectable()
export class GraduationService {

    private url = "graduation";

    constructor(
        private http: HttpClient
    ) { }

    public listGraduations(): Promise<Array<Graduation>>{
        return this.http.get<Array<Graduation>>(this.url).toPromise<Array<Graduation>>();
    }

}