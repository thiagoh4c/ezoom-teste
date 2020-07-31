import { Component, ViewChild, ChangeDetectorRef } from '@angular/core';
import { NavController, NavParams, Content } from 'ionic-angular';

import { WebService } from '../../providers/webservice.service';

@Component({
  selector: 'page-detalhe-curso',
  templateUrl: 'detalhe-curso.html',
})
export class DetalheCursoPage {

  @ViewChild(Content) content: Content;

  public categories = [
    "teste",
    "teste",
    "teste",
    "teste",
    "teste",
    "teste",
    "teste",
    "teste",

  ];

  public curso: any = false;
  public transparent: boolean;

  constructor(public navCtrl: NavController, public api: WebService,  public navParams: NavParams, public ref : ChangeDetectorRef) {
    this.transparent=true;

    let idCurso;
    if(idCurso = this.navParams.get('idCurso')){
      this.api.getCursoById(idCurso, (curso) => {
        this.curso = curso;
      });  
    }
    
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


  voltar(){
    this.navCtrl.pop();
  }

}
