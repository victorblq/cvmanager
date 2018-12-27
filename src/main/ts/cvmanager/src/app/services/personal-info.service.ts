import { Injectable } from '@angular/core';
import { HttpClient, HttpRequest } from '@angular/common/http';
import { PersonalInfo } from '../entity/personal-info';
import { Phone } from '../entity/phone';
import { Reference } from '../entity/reference';
import { Email } from '../entity/email';
import { Observable } from 'rxjs';

@Injectable()
export class PersonalInfoService {

    private url = "personal_info";

    constructor(
        private http: HttpClient
    ) { }

    public getPersonalInfo(): Promise<PersonalInfo>{
        return this.http.get<PersonalInfo>(this.url).toPromise<PersonalInfo>();
    }

    public updatePersonalInfo(personalInfo: PersonalInfo): Promise<PersonalInfo>{
        return this.http.put<PersonalInfo>(this.url, personalInfo).toPromise<PersonalInfo>();
    }

    /**
     * Phone
     */
    public savePhone(phone: Phone): Promise<PersonalInfo>{
        return this.http.post<PersonalInfo>(`${this.url}/phone`, phone).toPromise<PersonalInfo>()
    }

    public removePhone(phoneId: number): Promise<any>{
        return this.http.delete(`${this.url}/phone/${phoneId}`).toPromise();
    }

    /**
     * Email
     */
    public saveEmail(email: Email): Promise<PersonalInfo>{
        return this.http.post<PersonalInfo>(`${this.url}/email`, email).toPromise<PersonalInfo>()
    }

    public removeEmail(emailId: number): Promise<any>{
        return this.http.delete(`${this.url}/email/${emailId}`).toPromise();
    }

    /**
     * Reference
     */
    public saveReference(reference: Reference): Promise<PersonalInfo>{
        return this.http.post<PersonalInfo>(`${this.url}/reference`, reference).toPromise<PersonalInfo>()
    }

    public removeReference(referenceId: number): Promise<any>{
        return this.http.delete(`${this.url}/reference/${referenceId}`).toPromise();
    }

    /**
     * Image
     */
    public updateImage(formData: FormData): Promise<PersonalInfo>{
        return this.http.put<PersonalInfo>(`${this.url}/image`, formData, {reportProgress: true}).toPromise<PersonalInfo>();
    }
}