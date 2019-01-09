import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ProfessionalExperience } from '../entity/professional-experience';
import { AbstractService } from './abstract.service';

@Injectable()
export class ProfessionalExperienceService extends AbstractService<ProfessionalExperience>{

    constructor(
        public http: HttpClient
    ) { 
        super(http);
        this.url = "professional_experience";
    }
}