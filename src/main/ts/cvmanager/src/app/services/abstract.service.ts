import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable()
export class AbstractService<T> {

    public url;

    constructor(
        public http: HttpClient,
    ) { }

    public list(): Promise<Array<T>>{
        return this.http.get<Array<T>>(this.url).toPromise<Array<T>>();
    }

    public insert(entity: T): Promise<T>{
        return this.http.post<T>(this.url, entity).toPromise<T>();
    }

    public update(entity: T): Promise<T>{
        return this.http.put<T>(this.url, entity).toPromise<T>();
    }

    public delete(entityId: number): Promise<void>{
        return this.http.delete<void>(`${this.url}/${entityId}`).toPromise<void>();
    }
}