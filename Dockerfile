FROM php:8.4-fpm
# Define o diretório de trabalho dentro do container
WORKDIR /github/startup_connect/
# Instala as extensões necessárias para o banco de dados
RUN docker-php-ext-install pdo pdo_mysql
# Copia os arquivos do projeto para dentro do container
COPY ./src /github/startup_connect/
# Ajusta permissões para evitar problemas de escrita/leitura
RUN chown -R www-data:www-data /github/startup_connect/
# Expõe a porta do PHP-FPM
EXPOSE 9000
# Inicia o PHP-FPM quando o container for executado
CMD ["php-fpm"]