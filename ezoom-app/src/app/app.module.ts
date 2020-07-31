import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';

//Paginas e Componentes
import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { DetalheCursoPage } from '../pages/detalhe-curso/detalhe-curso';

//Providers
import { WebService } from '../providers/webservice.service';

//Modulos
import { HttpModule } from '@angular/http';

@NgModule({
  declarations: [
    MyApp,
    HomePage,
    DetalheCursoPage
  ],
  imports: [
    BrowserModule,
    HttpModule,
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    DetalheCursoPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    WebService,
    {provide: ErrorHandler, useClass: IonicErrorHandler}
  ]
})
export class AppModule {}
