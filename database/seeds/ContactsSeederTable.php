<?php

use Illuminate\Database\Seeder;
use App\Contact;
class ContactsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact= new Contact();
        $contact->name="Reinaldo";
        $contact->last_name="Gonzalez";
        $contact->address="Venezuela Cd Guayana";
        $contact->phone="04249652861";
        $contact->email="reinaldoagf1@gmail.com";
        $contact->photo="https://lh3.googleusercontent.com/-KCxYzFp2aik/XRZTrrGdnII/AAAAAAAABMw/0bc7s-VzZ5A8eScmcpbIxttMweFo7_tHACEwYBhgLKs0DAMBZVoBjRLDXqchtlrV95uCPT9Swlxm2snuPAOfQBH2mJk73TSLcnZsUcLexde7EKNcJ0VtZj7MN-eAFS6izcN6OiANBcoS0AGTgQnh49L9pMe3lMheX0SH44OGNBr-qmYCfakd72_S_RnVp_9JcsxbEmC0cFY_ouvtmP8w4DHxONZ4qcdoWjjzCHQQtxvl-aQaptBEnR6bBcRBBa4yl4Ezfj-D2-MaSGhptFckdrH_2tFxo39j-6QplU0XmxJF2S5TTPk2oXmjd5ZvmdscC-Fj2JCOCElJwcpS5M3yFsb-LeGDy3J03LgLaQ__y82o0a8L5CfoReZU8_3tR6VJ0g7eIW4Rv5pSdW3-hulsgvM8Ea1y7eqIy8hX0B4gbgpN2wwyA8ddnmVANOX8tKfi99iNGUlDRbpDptSvxfsnvWUjuDQ-ComceUnnuEZyne55xEKpBW85s7duTaWCUPWDgLOmPvZNrjXUFYSbHzQEPmpRkehBK8331EKf_y0EfbIq5sbbHL5UVYFWUUSoSpSSHwt9RfotBSwsRIOFrzEDb9S32yCiOlKpYJswouMY4DCTwDEI5-yxWz1sh2uNGtKwn5saI2wkWRZdSiVHnzwEwpbz-8wU/w140-h140-p/IMG_20190628_132600%25282%2529.jpg";
        $contact->save();
        //pruebas
        $faker = Faker\Factory::create();
        for ($i=0; $i < 5; $i++) { 
        	$contact= new Contact();
	        $contact->name=$faker->name;
	        $contact->last_name=$faker->lastName;
	        $contact->phone=$faker->phoneNumber;
	        $contact->email=$faker->email;
	        $contact->photo="https://exelord.com/ember-initials/images/default-d5f51047d8bd6327ec4a74361a7aae7f.jpg";
	        $contact->save();
        }
    }
}
