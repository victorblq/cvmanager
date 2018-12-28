import { Injectable } from '@angular/core';
declare var $: any;

@Injectable()
export class NotificationService {

    constructor() { }

    public showNotification(from, align, type, text): void{
        $.notify({
            icon: "notifications",
            message: text
  
        },{
            type: type,
            timer: 3000,
            placement: {
                from: from,
                align: align
            },
        });
    }
}