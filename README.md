# IIS-PHP-BATCH
Sistema web local que tem como objetivo receber informações das máquinas clientes de um servidor de domínio, com o intuito de fornecer subsídios para análises do setor de tecnologia da informação.

#Arquivo boot.bat
A primeira linha de código "net use Z: \127.0.0.0\pc$" está mapeando a unidade Z: para uma pasta compartilhada no computador local. Nesse caso, o endereço IP usado é 127.0.0.0 e o nome da pasta compartilhada é "pc$". O sinal de dólar ($) no final do nome da pasta indica que ela é uma pasta oculta compartilhada apenas para fins administrativos.

As duas linhas seguintes criam duas pastas dentro da unidade Z:, uma chamada "historico" e outra chamada com a data atual formatada com barras (/) substituídas por hífens (-), usando o comando "mkdir". Essas pastas serão usadas para armazenar os arquivos de texto gerados posteriormente.

A próxima linha de código usa o comando "systeminfo" para coletar informações do sistema e redireciona a saída para um arquivo de texto com o nome do usuário atual do sistema, salvo dentro da pasta com a data atual formatada, usando o sinal de porcentagem (%) para inserir o nome do usuário atual no nome do arquivo.

A linha seguinte usa o comando "ipconfig" com a opção "/all" para coletar informações sobre as configurações de rede do sistema e também redireciona a saída para um arquivo de texto com o nome do usuário atual do sistema, salvo dentro da pasta com a data atual formatada, usando o sinal de porcentagem (%) para inserir o nome do usuário atual no nome do arquivo e adicionando o sufixo "_rede".

Por fim, a última linha de código usa o comando "net use Z: /delete" para desconectar a unidade Z: do compartilhamento da pasta oculta do computador local.

Em resumo, o código cria duas pastas dentro da unidade Z:, coleta informações sobre o sistema e as configurações de rede do usuário atual e salva os resultados em arquivos de texto com nomes específicos dentro das pastas criadas anteriormente. Depois, ele desconecta a unidade Z: do compartilhamento da pasta oculta do computador local.
