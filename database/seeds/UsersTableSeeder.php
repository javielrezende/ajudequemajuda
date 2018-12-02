<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Roger Rezende',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123123),
            'imagem' => null,
            'cpf' => 1343826017,
            'cnpj' => null,
            'fone' => 53991172433,
            'funcao' => 2,
            'mensagem' => null,
            'descricao_entidade' => null,
            'solicitacao_entidade' => 0,
            'status' => 1,
            'enderecos_id' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Amor ao Próximo',
            'email' => 'amor@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => null,
            'cnpj' => 1111111111111,
            'fone' => 53991000000,
            'funcao' => 1,
            'mensagem' => 'Somos uma entidade filantrópica que ajuda o Próximo',
            'descricao_entidade' => 'Amor ao Próximo, venha nos auxiliar!',
            'solicitacao_entidade' => 1,
            'status' => 1,
            'enderecos_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Estreitando Laços',
            'email' => 'lacos@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => null,
            'cnpj' => 1111111111112,
            'fone' => 53991000001,
            'funcao' => 1,
            'mensagem' => 'Somos uma entidade filantrópica que estreita lacos entre carentes',
            'descricao_entidade' => 'Estreitando Laços, venha nos auxiliar!',
            'solicitacao_entidade' => 1,
            'status' => 1,
            'enderecos_id' => 3,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Sociedade Espírita União',
            'email' => 'uniao@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => null,
            'cnpj' => 1111111111113,
            'fone' => 53991000002,
            'funcao' => 1,
            'mensagem' => 'Somos uma entidade filantrópica que auxilia os necessitados',
            'descricao_entidade' => 'União, venha nos auxiliar!',
            'solicitacao_entidade' => 1,
            'status' => 1,
            'enderecos_id' => 4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Lar de Jesus',
            'email' => 'lar@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => null,
            'cnpj' => 1111111111114,
            'fone' => 53991000003,
            'funcao' => 1,
            'mensagem' => 'Somos uma entidade filantrópica que auxilia os necessitados',
            'descricao_entidade' => 'Lar de Jesus, venha nos auxiliar!',
            'solicitacao_entidade' => 1,
            'status' => 1,
            'enderecos_id' => 5,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Caridade Espírita',
            'email' => 'caridade@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => null,
            'cnpj' => 1111111111115,
            'fone' => 53991000004,
            'funcao' => 1,
            'mensagem' => 'Somos uma entidade filantrópica que auxilia com as necessidades depeciais das pessoas',
            'descricao_entidade' => 'Caridade Espírita, venha nos auxiliar!!',
            'solicitacao_entidade' => 1,
            'status' => 1,
            'enderecos_id' => 6,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Roger',
            'email' => 'javielrezende@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => 12636169823,
            'cnpj' => null,
            'fone' => 53991112233,
            'funcao' => 0,
            'status' => 1,
            'enderecos_id' => 7,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Celina',
            'email' => 'celina@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => 12636169824,
            'cnpj' => null,
            'fone' => 53991112234,
            'funcao' => 0,
            'status' => 1,
            'enderecos_id' => 8,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Jose',
            'email' => 'jose@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => 12636169825,
            'cnpj' => null,
            'fone' => 53991112235,
            'funcao' => 0,
            'status' => 1,
            'enderecos_id' => 9,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Ricardo',
            'email' => 'ricardo@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => 12636169826,
            'cnpj' => null,
            'fone' => 53991112236,
            'funcao' => 0,
            'status' => 1,
            'enderecos_id' => 10,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Paulo',
            'email' => 'paulo@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => 12636169827,
            'cnpj' => null,
            'fone' => 53991112237,
            'funcao' => 0,
            'status' => 1,
            'enderecos_id' => 11,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Luisa',
            'email' => 'luisa@gmail.com',
            'password' => bcrypt(123123),
            'cpf' => 12636169828,
            'cnpj' => null,
            'fone' => 53991112238,
            'funcao' => 0,
            'status' => 1,
            'enderecos_id' => 12,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}
