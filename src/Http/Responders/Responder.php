<?php
namespace TypeRocket\Http\Responders;

use \TypeRocket\Http\Kernel,
    \TypeRocket\Http\Request,
    \TypeRocket\Http\Response;

abstract class Responder
{
    public $kernel;

    abstract public function respond( $id );

    /**
     * Run the Kernel
     *
     * A class XKernel to override the Kernel but it should extend the
     * Kernel.
     *
     * @param Request $request
     * @param Response $response
     * @param string $type
     */
    public function runKernel(Request $request, Response $response, $type = 'hookGlobal')
    {
        $XKernel = "\\" . TR_APP_NAMESPACE . "\\Http\\XKernel";

        if ( class_exists( $XKernel ) ) {
            $this->kernel = new $XKernel( $request, $response, $type);
        } else {
            $this->kernel =  new Kernel($request, $response, $type);
        }
    }
}