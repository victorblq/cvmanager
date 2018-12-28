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

    public listGraduationStatus(): Promise<Array<string>>{
        return this.http.get<Array<string>>(`${this.url}/graduation_status`).toPromise<Array<string>>();
    }

    public insertGraduation(graduation: Graduation): Promise<Graduation>{
        return this.http.post<Graduation>(this.url, graduation).toPromise<Graduation>();
    }
}