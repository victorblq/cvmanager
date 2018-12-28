import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
    selector: 'admin-root',
    templateUrl: 'admin.component.html'
})

export class AdminComponent implements OnInit {
    
    public pageTitle: string;

    constructor(
        private router: Router
    ) { }

    ngOnInit() { 
        if(this.router.url === '/admin') {
            setTimeout(() => {
                this.router.navigate(['/admin/dashboard']);
            }, 1500);
        }
    }
}