<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function orm_autoload($class_name) {

    if (strpos(strtolower($class_name), 'orm') === 0) {

        $folder = APPPATH . 'orm/';
        $file_name = $folder . strtolower($class_name) . '.php';

        if(!file_exists($file_name)) {

            if (is_dir($folder)) {
                $file_name = get_folder_orm($folder, $file_name, $class_name);
            }

            if(!file_exists($file_name)) {
                $folder = APPPATH . 'modules/';
                if (is_dir($folder)) {
                    foreach (License::get_instance()->get_modules() as $module => $enabled) {
                        if ($enabled) {
                            $module_folder = "{$folder}{$module}/orm/";
                            $file_name = $module_folder . strtolower($class_name) . '.php';

                            if (is_dir($module_folder) && !file_exists($file_name)) {
                                $file_name = get_folder_orm($module_folder, $file_name, $class_name);
                            }

                            if (file_exists($file_name)) {
                                break;
                            }
                        }
                    }
                }
            }
        }

        if (file_exists($file_name)) {
            require_once $file_name;
        } else {
            return false;
        }

        return true;
    }

}

function get_folder_orm($folder, $file_name, $class_name) {

    $str_lower_class_name = str_replace('orm_', '', strtolower($class_name));

    $dir_list = array();
    create_path_from_string($str_lower_class_name, $folder , $dir_list);
    if ($dir_list) {
        $file_name = $folder . implode('/', $dir_list) . '/' . str_replace(implode('_', $dir_list) . '_', '', $str_lower_class_name) . '.php';
    }

    return $file_name;
}

function create_path_from_string($string, $dir, &$dir_list = array()) {
    $parts = explode('_', $string);
    for ($i = 1; $i < count($parts); $i++) {
        $path_items = array_slice($parts, 0, $i);
        if(file_exists($dir . $string.'.php')) {
            break;
        } elseif (is_dir($dir . implode('_', $path_items))) {
            $dir_list[] = implode('_', $path_items);
            break;
        }
    }
    if ($i < count($parts) - 1) {
        $parts = array_slice($parts, $i);
        create_path_from_string(implode('_', $parts), $dir . implode('_', $path_items) . '/', $dir_list);
    }
}

spl_autoload_register('orm_autoload');