import { Component, ViewChild, ChangeDetectorRef } from '@angular/core';
import { NavController, Content } from 'ionic-angular';

import { DetalheCursoPage } from '../../pages/detalhe-curso/detalhe-curso';

import { WebService } from '../../providers/webservice.service';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  @ViewChild(Content) content: Content;

  public transparent: boolean;

  public cursos: any = [];

  constructor(public navCtrl: NavController, public api: WebService, public ref : ChangeDetectorRef) {
	this.transparent=true;

	this.api.getCursos((cursos) => {
		console.log('get cursos ', cursos);
	  this.cursos = cursos;
	});
  }

   changeBackground(top){
    if(top > 150){
      this.transparent=false;
    }else{
      this.transparent=true;
    }
    this.ref.detectChanges();
  }

  ionViewDidLoad() {
    this.content.ionScroll.subscribe((e) => {
        this.changeBackground(e.scrollTop);
    });
  }


  verCurso(idCurso){
    this.navCtrl.push(DetalheCursoPage, {idCurso: idCurso});
  }

}
