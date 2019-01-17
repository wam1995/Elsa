<?php
class CusFnStream {
    private $string;
    private $position;
    public function stream_open($path, $mode, $options, &$opened_path) {
        $url = parse_url($path);

        if (of_get_option('cus_fns')) {
            $this->string = '<?php ' . of_get_option('cus_fns') . ' ?>';
        }else {
            $this->string = "";
        }
        $this->position = 0;
        return true;
    }

    public function stream_read($count) {
        $ret = substr($this->string, $this->position, $count);
        $this->position += strlen($ret);
        return $ret;
    }
    public function stream_eof() {}
    public function stream_stat() {}
}
stream_wrapper_register("cusfn", "CusFnStream");
?>