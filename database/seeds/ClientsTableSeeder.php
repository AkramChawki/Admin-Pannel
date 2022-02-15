<?php

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        $clients = [
            [
                'id'    => '1',
                'Intitule'    => 'Client1',
                'Abrege'    => 'CL1',
                'Compte_collectif'    => 'CC1',
                'Interlocuteur'    => 'Employe',
                'Adresse'    => 'Centre ville',
                'Code_postal'    => '20210',
                'Ville'    => 'Casablanca',
                'Region'    => 'Grand Casablanca',
                'Pays'    => 'Maroc',
                'Telephone'    => '0661000000',
                'Email'    => 'Test@Test.com',
                'Site_web'    => 'www.test.com',
                'SIRET'    => '123456789',
                'Code_NAF'    => '12',
                'ID_TVA'    => '20',
            ],
        ];
        Client::insert($clients);
    }
}