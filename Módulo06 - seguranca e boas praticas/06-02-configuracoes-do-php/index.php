<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("06.02 - Configurações do PHP");

/*
 * [ allow_url_fopen | allow_url_include ] Com eles sua aplicação fica vulnerável a
 * ataques de inclusão remotas de arquivos (RFI) e negação de serviços (DoS).
 *
 * RFI: File Remote Inclusion
 * DoS: Denial of service
 */
fullStackPHPClassSession("RFI and DoS", __LINE__);

var_dump([
    "allow_url_fopen" => ini_get('allow_url_fopen'),
    "allow_url_include" => ini_get('allow_url_include')
]);


/*
 * [ DoS (Denial of Service) ] Configurações que melhoram performance e ajudam a evitar
 * ataques de negação de serviço.
 *
 * [ memory_limit ] 64m (pequenas), 128m (a maioria) e 512m ou + (grandes) de memória alocada
 * para o PHP. Uma regra básica de 1/4 (da memória do servidor) pode ser aplicada.
 *
 * [ max_execution_time ] O padrão é 30s, mas vamos buscar o mínimo possível ou o máximo
 * aceitável (5s) para seu usuário esperar.
 *
 * [ max_input_time ] É o tempo que o PHP interpreta dados vindos via GET ou POST. O padrão
 * é 60 segundos, e esse é um bom número devido ao tratamento da aplicação.
 */
fullStackPHPClassSession("memory and time", __LINE__);

var_dump([
    "memory_get_peak_usage" => $mem = memory_get_peak_usage(),
    "memory_get_peak_usage | M" => number_format($mem / (1024 * 1024), 2) . "M",
], [
    "memory_limit" => ini_get("memory_limit"),
    "max_execution_time" => ini_get("max_execution_time"),
    "max_input_time" => ini_get("max_input_time")
]);


/*
 * [ post_max_size ] Limite máximo permitido em dados vindos de um formulário.

 * [ max_input_nesting_level ] Profundidade máxima permitida em um vetor. (GET, POST)
 *
 * [ file_uploads ] Permiter ou não o envio de arquivos em formulários.
 *
 * [ upload_max_filesize ] Tamanho máximo de UM arquivo no formulário.
 *
 * [ max_file_uploads ] Quantidade máxima de arquivos em UMA requisição
 */
fullStackPHPClassSession("post and files", __LINE__);

var_dump([
    "post_max_size" => ini_get("post_max_size"),
    "max_input_nesting_level" => ini_get("max_input_nesting_level"),
    "file_uploads" => ini_get("file_uploads"),
    "upload_max_filesize" => ini_get("upload_max_filesize"),
    "max_file_uploads" => ini_get("max_file_uploads") //padrão 20
]);


/*
 * [ output_buffering ] Limita a quantidade de requisições melhorando a performance da
 * aplicação ao empurrar todos os comandos de saída para o final da requisição.
 *
 * [ implicit_flush ] Em off para empurrar o buffering para o final da saída. Em on
 * para descarregar a cada echo, print, etc.
 */
fullStackPHPClassSession("buffering", __LINE__);

var_dump([
    "output_buffering" => ini_get("output_buffering"),
    "implicit_flush" => ini_get("implicit_flush")
]);


/*
 * [ realpath_cache_size ] O PHP consegue manter um cache de arquivos usados em sua
 * aplicação para evitar reprocessamento e com isso melhora a performance.
 *
 * [ realpath_cache_ttl ] É o tempo em segundos deste cache.
 */
fullStackPHPClassSession("realpath", __LINE__);

var_dump([
    "realpath_cache_size()" => realpath_cache_size(),
], [
    "realpath_cache_size" => ini_get("realpath_cache_size"),
    "realpath_cache_ttl" => ini_get("realpath_cache_ttl")
]);


/*
 * [ OPcache ] Um cache bytecode de scripts PHP pré-compilados em memória compartilhada
 * que elimina a necessidade do PHP carregar e analisar scripts em cada requisição.
 */
fullStackPHPClassSession("opcache", __LINE__);

var_dump(
    opcache_get_configuration(),
    opcache_get_status()["scripts"]
);