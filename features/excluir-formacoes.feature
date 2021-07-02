#language: pt
Funcionalidade: Excluir formações
    Eu, como instrutor
    Quero poder excluir uma formação
    Para poder organizar minha lista de informações

    @e2e
    Cenário: Excluir formação existente
        Dado estou em "/login"
        E preencho "email" com "bruna@alura.com.br"
        E preencho "senha" com "123456"
        E pressiono "Entrar"
        E sigo o link "Formações"
        Quando sigo o link "Excluir"
        Então devo ver "Formação excluída com sucesso"