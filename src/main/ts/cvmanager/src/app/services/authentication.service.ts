import { Injectable } from '@angular/core';
import { Http } from '@angular/http';

@Injectable({
    providedIn: 'root'
})
export class AuthenticationService {

    private url = "authenticated";

    constructor(
        private http: Http
    ) { }

    public getAuthenticatedUser(){
        return this.http.get(this.url).toPromise();
    }
}