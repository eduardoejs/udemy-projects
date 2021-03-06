<?php

use Illuminate\Database\Seeder;
use App\Permissao;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $usuarios1 = Permissao::firstOrCreate([
          'nome' =>'usuario-view',
          'descricao' =>'Acesso a lista de Usuários'
      ]);
      $usuarios2 = Permissao::firstOrCreate([
          'nome' =>'usuario-create',
          'descricao' =>'Adicionar Usuários'
      ]);
      $usuarios2 = Permissao::firstOrCreate([
          'nome' =>'usuario-edit',
          'descricao' =>'Editar Usuários'
      ]);
      $usuarios3 = Permissao::firstOrCreate([
          'nome' =>'usuario-delete',
          'descricao' =>'Deletar Usuários'
      ]);

      $papeis1 = Permissao::firstOrCreate([
          'nome' =>'papel-view',
          'descricao' =>'Listar Papéis'
      ]);
      $papeis2 = Permissao::firstOrCreate([
          'nome' =>'papel-create',
          'descricao' =>'Adicionar Papéis'
      ]);
      $papeis3 = Permissao::firstOrCreate([
          'nome' =>'papel-edit',
          'descricao' =>'Editar Papéis'
      ]);

      $papeis4 = Permissao::firstOrCreate([
          'nome' =>'papel-delete',
          'descricao' =>'Deletar Papéis'
      ]);

      $favoritos1 = Permissao::firstOrCreate([
          'nome' =>'favoritos-view',
          'descricao' =>'Acesso aos favoritos'
      ]);

      $favoritos2 = Permissao::firstOrCreate([
          'nome' =>'favoritos-create',
          'descricao' =>'Adicionar favoritos'
      ]);

      $favoritos3 = Permissao::firstOrCreate([
          'nome' =>'favoritos-delete',
          'descricao' =>'Deletar favoritos'
      ]);

      $perfil1 = Permissao::firstOrCreate([
          'nome' =>'perfil-view',
          'descricao' =>'Acesso ao perfil'
      ]);

      $perfil2 = Permissao::firstOrCreate([
          'nome' =>'perfil-edit',
          'descricao' =>'Atualizar perfil'
      ]);

      $chamados1 = Permissao::firstOrCreate([
          'nome' =>'chamados-view',
          'descricao' =>'Acesso aos chamados'
      ]);

      $chamados2 = Permissao::firstOrCreate([
          'nome' =>'chamados-create',
          'descricao' =>'Acesso aos chamados'
      ]);
      $chamados3 = Permissao::firstOrCreate([
          'nome' =>'chamados-edit',
          'descricao' =>'Acesso aos chamados'
      ]);
      $chamados4 = Permissao::firstOrCreate([
          'nome' =>'chamados-delete',
          'descricao' =>'Acesso aos chamados'
      ]);

      $imagens1 = Permissao::firstOrCreate([
          'nome' =>'imagens-view',
          'descricao' =>'Acesso à lista de imagens'
      ]);

      $imagens2 = Permissao::firstOrCreate([
          'nome' =>'imagens-create',
          'descricao' =>'Adicionar imagens'
      ]);
      $imagens3 = Permissao::firstOrCreate([
          'nome' =>'imagens-edit',
          'descricao' =>'Editar imagens'
      ]);
      $imagens4 = Permissao::firstOrCreate([
          'nome' =>'imagens-delete',
          'descricao' =>'Deletar imagens'
      ]);

      $carros1 = Permissao::firstOrCreate([
          'nome' =>'carros-view',
          'descricao' =>'Acesso à lista de carros'
      ]);

      $carros2 = Permissao::firstOrCreate([
          'nome' =>'carros-create',
          'descricao' =>'Adicionar carros'
      ]);
      $carros3 = Permissao::firstOrCreate([
          'nome' =>'carros-edit',
          'descricao' =>'Editar carros'
      ]);
      $carros4 = Permissao::firstOrCreate([
          'nome' =>'carros-delete',
          'descricao' =>'Deletar carros'
      ]);

      $slides1 = Permissao::firstOrCreate([
          'nome' =>'slides-view',
          'descricao' =>'Visualizar lista de slides'
      ]);

      $slides2 = Permissao::firstOrCreate([
          'nome' =>'slides-create',
          'descricao' =>'Adicionar slides'
      ]);
      $slides3 = Permissao::firstOrCreate([
          'nome' =>'slides-edit',
          'descricao' =>'Editar slides'
      ]);
      $slides4 = Permissao::firstOrCreate([
          'nome' =>'slides-delete',
          'descricao' =>'Deletar slides'
      ]);

      echo "Registros de Permissoes criados no sistema";
    }
}
