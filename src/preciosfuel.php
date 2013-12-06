<?php
/**
 * @Name: consultar Combustibles Dominicanos
 * @author :Jose Ramon De Los Santos Oviedo
 * @version: 0.0.1
 * @date : 2013-11-04
 *
 **/
class PreciosFuel
{
	private $_schemeHtml;
	private $_fuelValue;
	private $_url = 'http://www.seic.gov.do/hidrocarburos/avisos-semanales-de-precios/combustibles.aspx';

	public function __construct()
	{
		$this->_schemeHtml = file_get_contents($this->_url);
		$this->_buildDom();
	}

	private function _buildDom()
	{
		$dom = new DomDocument();
		libxml_use_internal_errors(true);
		$dom->loadHtml($this->_schemeHtml);
		$xpath = new DomXpath($dom);

		$res = $xpath->query('//div[@class="precio"]')->item(0);

		foreach ($res->childNodes as $node) {
			$this->_fuelValue[] = $node->nodeValue;
		}
	}

	public function getResource()
	{
		if (!headers_sent()) {
			header('Content-type: text/json');
			header('Content-type: application/json');
		}

		return json_encode($this->_fuelValue, JSON_FORCE_OBJECT);
	}
}
