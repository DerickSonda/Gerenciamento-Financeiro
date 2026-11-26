<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->string('telefone', 20)->nullable()->after('email');
            $table->string('cpf', 11)->nullable()->unique()->after('telefone');
            $table->boolean('notificacoes_gastos')->default(true);
            $table->boolean('resumo_semanal')->default(true);
        });
    }

    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropUnique(['cpf']);
            $table->dropColumn(['telefone', 'cpf', 'notificacoes_gastos', 'resumo_semanal']);
        });
    }
};
