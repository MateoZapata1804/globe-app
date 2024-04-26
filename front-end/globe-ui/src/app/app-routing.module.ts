import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule)
  },
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  {
    path: 'countries',
    loadChildren: () => import('./pages/countries/countries.module').then( m => m.CountriesPageModule)
  },
  {
    path: 'budgets',
    loadChildren: () => import('./pages/budgets/budgets.module').then( m => m.BudgetsPageModule)
  },
  {
    path: 'view-data',
    loadChildren: () => import('./pages/view-data/view-data.module').then( m => m.ViewDataPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
