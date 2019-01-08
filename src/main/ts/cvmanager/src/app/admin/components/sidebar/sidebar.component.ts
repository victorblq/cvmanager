import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

declare const $: any;
declare interface RouteInfo {
    path: string;
    title: string;
    icon: string;
    class: string;
}
export const ROUTES: RouteInfo[] = [
    { path: 'dashboard', title: 'dashboard.dashboard', icon: 'dashboard', class: '' },
    { path: 'personal-info', title: 'personal-info.personal-info', icon: 'person', class: '' },
    { path: 'graduation', title: 'graduation.graduation', icon: 'school', class: '' },
    { path: 'professional-experience', title: 'professional-experience.professional-experience', icon: 'work', class: '' },
    { path: 'qualifications', title: 'qualifications', icon: 'trending_up', class: '' },
    { path: 'projects', title: 'projects', icon: 'build', class: '' },
    { path: 'extra-activities', title: 'extra-activities', icon: 'library_books', class: '' },
];

@Component({
    selector: 'app-sidebar',
    templateUrl: './sidebar.component.html',
    styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {
    menuItems: any[];

    constructor(
        private router: Router
    ) { }

    ngOnInit() {
        this.menuItems = ROUTES.filter(menuItem => menuItem);
    }

    isMobileMenu() {
        if ($(window).width() > 991) {
            return false;
        }
        return true;
    };
}