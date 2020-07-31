import { Injectable } from '@angular/core';
import { Platform } from 'ionic-angular';
import { Http, Headers, RequestOptions} from '@angular/http';

@Injectable()
export class WebService {

  public Token: string = '0ecaeb07630103cbcd204a3f962b493f';
  public apiUrl = 'http://localhost/api';

  constructor(public http: Http, public platform: Platform ) {

  }


  getCursos(callback){  

    console.log('api getCursos: ',this.apiUrl+'/getCursos');

    var headers = new Headers();
    headers.append('token', this.Token);

    var options = new RequestOptions({ headers: headers });

    this.http.get(this.apiUrl + '/getCursos', options).map(res => res.json()).subscribe(data => {
      console.log('data get cursos ', data);
        callback(data);  
    }, (err) => {
      console.log('error data get cursos ', err);
        callback({});
    });

  }

  getCursoById(idCurso, callback){  

    console.log('api getCursos: ',this.apiUrl+'/getCursoById');

    var headers = new Headers();
    headers.append('token', this.Token);

    var options = new RequestOptions({ headers: headers });

    this.http.get(this.apiUrl + '/getCursoById/'+idCurso, options).map(res => res.json()).subscribe(data => {
        callback(data);
    }, (err) => {
        callback({});
    });

  }


 
}
