<?php
class Customsvalidations {
	public function _validation_isunique($val, $options)
    {
		$result = Model_Simpleuser::find()->where('username', $val)->get_one();
        /*list($table, $field) = explode('.', $options);

        $result = DB::select("LOWER (\"$field\")")->where($field, '=', Str::lower($val))->from($table)->execute();

        return !($result->count() > 0);*/
		return !($result->count() > 0);
    }
}