<?php
namespace MrPrompt\ImovelWeb\Tests\Imobiliarias;

use GuzzleHttp\Psr7\Response;
use MrPrompt\ImovelWeb\Imobiliarias\Imobiliarias;
use MrPrompt\ImovelWeb\Tests\Base\Base;

final class ImobiliariasTest extends Base
{
    /**
     * @test
     */
    public function listar()
    {
        $handleResponse = '{
            "number": 0,
            "size": 2,
            "total": 2,
            "content": [
                {
                    "codigoInmobiliaria": "15435917",
                    "idNavplat": 15435917,
                    "nombre": "GENNARO",
                    "habilitadoDesde": 1563891590000,
                    "bloqueada": true
                },
                {
                    "codigoInmobiliaria": "15447738",
                    "idNavplat": 15447738,
                    "nombre": "Frosini Imóveis",
                    "habilitadoDesde": 1563891591000,
                    "bloqueada": false
                }
            ]
        }';

        $handlerStack = [
            new Response(200, [], $handleResponse),
        ];

        $this->client = $this->getClient($handlerStack);
        $this->service = new Imobiliarias($this->client);

        $result = $this->service->listar();

        $this->assertArrayHasKey('number', $result);
        $this->assertArrayHasKey('size', $result);
        $this->assertArrayHasKey('total', $result);
        $this->assertArrayHasKey('content', $result);
    }
}
