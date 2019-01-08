import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ProfessionalExperience } from '../entity/professional-experience';

@Injectable()
export class ProfessionalExperienceService {

    private url = "professional_experience";

    constructor(
        private http: HttpClient
    ) { }

    public listProfessionalExperience(): Promise<Array<ProfessionalExperience>>{
        return this.http.get<Array<ProfessionalExperience>>(this.url).toPromise<Array<ProfessionalExperience>>();
    }

    public insertProfessionalExperience(professionalExperience: ProfessionalExperience): Promise<ProfessionalExperience>{
        return this.http.post<ProfessionalExperience>(this.url, professionalExperience).toPromise<ProfessionalExperience>();
    }

    public updateProfessionalExperience(professionalExperience: ProfessionalExperience): Promise<ProfessionalExperience>{
        return this.http.put<ProfessionalExperience>(this.url, professionalExperience).toPromise<ProfessionalExperience>();
    }
}