#language: pt
Funcionalidade: Login
    Descrição da funcionalidade

    @e2e
    Cenario: Realizar login
    Dado estou em "/login"
    Quando preencho "email" com "bruna@alura.com.br"
    E preencho "senha" com "123456"
    E pressiono "Entrar"
    Então devo estar em "/listar-cursos"