<?php declare(strict_types=1);
/*
 * @copyright     Copyright (c) 2024 PHP Core (https://php-core.com)
 * @author        Kai Enderes <kai@php-core.com>
 * @created       3.10.2024
 */

namespace PHPCore\AbaNinja\Classes;

class TranslationsModel extends Model
{
	public static function getTranslationKeys(): array
	{
		return [];
	}

	public static function getLanguageCodes(): array
	{
		return ['de', 'en', 'fr', 'it'];
	}

	public function __construct(
		protected ?\stdClass $de = null,
		protected ?\stdClass $en = null,
		protected ?\stdClass $fr = null,
		protected ?\stdClass $it = null,
	) {}

	public static function create(
		string|array      $de,
		null|string|array $en = null,
		null|string|array $fr = null,
		null|string|array $it = null
	): static
	{
		$translations = [];
		foreach ([$de, $en, $fr, $it] as $translationValues) {
			if (!is_array($translationValues)) {
				$translationValues = [static::getTranslationKeys()[0] => $translationValues];
			}
			$translationClass = new \stdClass();
			foreach (static::getTranslationKeys() as $translationKey) {
				$translationClass->{$translationKey} = $translationValues[$translationKey] ?? '';
			}
			$translations[] = $translationClass;
		}
		return new static(...$translations);
	}

	public function getCreateData(array $extraData = []): array
	{
		$createData = [];
		foreach (static::getLanguageCodes() as $languageCode) {
			$createData[$languageCode] = empty($this->{$languageCode})
				? array_fill_keys(static::getTranslationKeys(), '')
				: (array)$this->{$languageCode};
		}
		return $createData;
	}

	/* getters and setters */

	public function getDe(): ?\stdClass
	{
		return $this->de;
	}

	public function setDe(?\stdClass $de): TranslationsModel
	{
		$this->de = $de;
		return $this;
	}

	public function getEn(): ?\stdClass
	{
		return $this->en;
	}

	public function setEn(?\stdClass $en): TranslationsModel
	{
		$this->en = $en;
		return $this;
	}

	public function getFr(): ?\stdClass
	{
		return $this->fr;
	}

	public function setFr(?\stdClass $fr): TranslationsModel
	{
		$this->fr = $fr;
		return $this;
	}

	public function getIt(): ?\stdClass
	{
		return $this->it;
	}

	public function setIt(?\stdClass $it): TranslationsModel
	{
		$this->it = $it;
		return $this;
	}
}
