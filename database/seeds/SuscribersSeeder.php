<?php

use Illuminate\Database\Seeder;
use App\Suscriber;

class SuscribersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      foreach(Self::SUSCRIBERS as $s){
        echo "Inserting:: ".$s[0]."\n";

        if(!filter_var($s[0], FILTER_VALIDATE_EMAIL)){
          continue;
        }

        /*if(preg_match("/^\w+$/i", "Gomez")){
          dd('valido');
        }
        
        dd('find');*/


      	$exists = Suscriber::where('email', $s[0])->exists();
      	if($exists){
      		continue;
      	}
        
      	$sus = new Suscriber;
      	$sus->name = $s[1] == "" ? NULL : strtoupper($s[1]);        
      	$sus->email = $s[0];
      	if($sus->save()){
      		echo $s[0]." Saved!\n";
      	}      	
      }
    }

    const SUSCRIBERS = [
      ['hcrolando3301@gmail.com','CPA Lic. Rolando Walter Huanca Cordero'],
['alexanderdelaossa@gmail.com','Alexander'],
['mbarriosherrera@yahoo.com','Manuel'],
['mdanielagm@gmail.com','Daniela Gonzales'],
['apazamilamica@gmail.com','Micaela'],
['quisperuben841@gmail.com','Ruben E. Quispe'],
['yulianhjyd@gmail.com','HUMBERTO JULIAN YUJRA'],
['valentina-bg@hotmail.com','Valentina'],
['vilma07quispe08@gmail.com','Vilma Quispe Huaycho'],
['renatamarina163@gmail.com','Renata'],
['serranomonika97@gmail.com','Mónica'],
['cesaroblockc@gmail.com','Cesar'],
['cesiavidal@outlook.es','Cesia Gabriela Vidal German'],
['yulii.grado@gmail.com','Julissa Coronado Grado'],
['choquecarmen340@gmail.com','Carmen choque'],
['felipetriana98@gmail.com','David Felipe'],
['wilcor03@gmail.com','wilmer c'],
['anallygarcia10@gmail.com','Lesly'],
['Kattybaquegarcia@yahoo.es','katty'],
['tebadrums@gmail.com','Esteban'],
['cesar.cabrera985@esap.gov.co','César Cabrera'],
['fer_fran84@hotmail.com','Fausto Fernández Franco'],
['ing.santos.dadlc@gmail.com','Santos'],
['svpqr2021@gmail.com','VIVIANA SALINAS OLARTE'],
['copete1200@hotmail.com','Luis alfonso copete mosquera'],
['kerlybarzola262001@gmail.com','Kerly'],
['carlosantonio7588@gmail.com','Carlos'],
['sandoval.mario.08@gmail.com','Mario Sandoval'],
['joewylyc@gmail.com','Joe Córdova'],
['alexpere411@gmail.com','Alex Perez'],
['yomigue2015@gmail.com','Humberto Torres'],
['jhona220187@gmail.com','jhonatan'],
['wcueva1991@gmail.com','Wildisman cueva solano'],
['reyesfarje@gmail.com','Fredy Reyes Farje'],
['diegodavidzr1967v2@yahoo.com','Diego ZAPATA'],
['harry.martinez.02@gmail.com','Harry Martinez'],
['jose.neglia1@gmail.com','José Neglia'],
['erikito110@gmail.com','Erick Raúl Patzi Mamani'],
['harold.martinez.04@gmail.com','Harold Martínez'],
['evisjothm1979@gmail.com','Evis Mosquera'],
['ag071098@gmail.com','Angélica García Teja'],
['rlagunabermudez@hotmail.com','Rusvel'],
['rdiaz@promarisco.com','RolanDíaz iaz'],
['hecalanpo@gmail.com','Hector Alonso'],
['hjml7573@gmail.com','Harry Martinez'],
['ivanribar77@gmail.com','Ivan Arturo Riveros Barrientos'],
['yhony1974@hotmail.com','Yhonier vergara'],
['samisophia15@gmail.com','sandra'],
['caro.vallejos.2012@gmail.com','Mercedes carolina'],
['linsismat@gmail.com','Ramiro'],
['estefy2531@hotmail.com','Estefany ruiz'],
['danlo3c@hotmail.com','Danilo'],
['jeampiersqc@gmail.com','Jeampier Smith Quinteros Castro'],
['juankarl96@gmail.com','Juan Carlos'],
['micaelaoquendo66@gmail.com','Micaela Míchel Huanaco Oquendo'],
['flopez2980@gmail.com','Franklin López'],
['jarody.lopez@gmail.com','Josué Arody López Raxón'],
['elinosan31@hotmail.com','Elixandre Noriega Sanjuan'],
['yerkoalexcarvajal@gmail.com','Yerko Alex Carvajal Herbas'],
['Makirtorodriguez@gmail.com','Marco Rodríguez'],
['aleirbagmc0222@gmail.com','Gabriela Mendoza'],
['jorgerolando270@gmail.com','Jorge'],
['omarsnchez@gmail.com','Omar Rodolfo Sánchez Obando'],
['marti_yaz@yahoo.com.mx','Mary Cruz'],
['alvarojgc1981@gmail.com','Alvaro Jose Giraldo Cuaicuan'],
['alexperdomoq@gmail.com','Alexander Perdomo'],
['jgrm75@gmail.com','juan']
  ];
}