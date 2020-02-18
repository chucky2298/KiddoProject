<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_wdt']), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_search_results']), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler']), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_router']), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception']), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, ['_route' => '_profiler_exception_css']), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => '_twig_error_test']), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // events_homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'EventsBundle\\Controller\\DefaultController::indexAction',  '_route' => 'events_homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_events_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'events_homepage'));
            }

            return $ret;
        }
        not_events_homepage:

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/ajout')) {
                if (0 === strpos($pathinfo, '/ajouter')) {
                    // ajouter_event
                    if ('/ajouterEvent' === $pathinfo) {
                        return array (  '_controller' => 'EventsBundle\\Controller\\EventsController::ajoutEventAction',  '_route' => 'ajouter_event',);
                    }

                    // ajouter_category
                    if ('/ajouterCategory' === $pathinfo) {
                        return array (  '_controller' => 'EventsBundle\\Controller\\CategoryController::ajouterCategoryAction',  '_route' => 'ajouter_category',);
                    }

                    // ajouter_participation
                    if ('/ajouterParticipation' === $pathinfo) {
                        return array (  '_controller' => 'EventsBundle:Pass:ajouterParticipations',  '_route' => 'ajouter_participation',);
                    }

                }

                // ajoutEnfant
                if ('/ajoutEnfant' === $pathinfo) {
                    return array (  '_controller' => 'GererEnfantBundle\\Controller\\EnfantController::ajoutEnfantAction',  '_route' => 'ajoutEnfant',);
                }

                // ajoutNote
                if ('/ajoutNote' === $pathinfo) {
                    return array (  '_controller' => 'GererEnfantBundle\\Controller\\NoteController::ajoutNoteAction',  '_route' => 'ajoutNote',);
                }

            }

            elseif (0 === strpos($pathinfo, '/affiche')) {
                if (0 === strpos($pathinfo, '/afficher')) {
                    // afficher_event
                    if ('/afficherEvent' === $pathinfo) {
                        return array (  '_controller' => 'EventsBundle\\Controller\\EventsController::afficherEventAction',  '_route' => 'afficher_event',);
                    }

                    // afficher_category
                    if ('/afficherCategory' === $pathinfo) {
                        return array (  '_controller' => 'EventsBundle\\Controller\\CategoryController::afficherCategoryAction',  '_route' => 'afficher_category',);
                    }

                    // afficher_participation
                    if ('/afficherParticipation' === $pathinfo) {
                        return array (  '_controller' => 'EventsBundle:Pass:afficherParticipations',  '_route' => 'afficher_participation',);
                    }

                }

                // afficheEnfant
                if ('/afficheEnfant' === $pathinfo) {
                    return array (  '_controller' => 'GererEnfantBundle\\Controller\\EnfantController::afficheEnfantAction',  '_route' => 'afficheEnfant',);
                }

                // afficheNote
                if ('/afficheNote' === $pathinfo) {
                    return array (  '_controller' => 'GererEnfantBundle\\Controller\\NoteController::afficheNoteAction',  '_route' => 'afficheNote',);
                }

            }

            // reclamation_ajout
            if ('/addReclamation' === $pathinfo) {
                return array (  '_controller' => 'ReclamationBundle\\Controller\\ReclamationController::ajoutAction',  '_route' => 'reclamation_ajout',);
            }

        }

        elseif (0 === strpos($pathinfo, '/supprimer')) {
            // supprimer_event
            if (0 === strpos($pathinfo, '/supprimerEvent') && preg_match('#^/supprimerEvent/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'supprimer_event']), array (  '_controller' => 'EventsBundle\\Controller\\EventsController::supprimerEventAction',));
            }

            // supprimer_category
            if (0 === strpos($pathinfo, '/supprimerCategory') && preg_match('#^/supprimerCategory/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'supprimer_category']), array (  '_controller' => 'EventsBundle\\Controller\\CategoryController::supprimerCategoryAction',));
            }

            // supprimer_participation
            if (0 === strpos($pathinfo, '/supprimerParticipation') && preg_match('#^/supprimerParticipation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'supprimer_participation']), array (  '_controller' => 'EventsBundle:Pass:supprimerParticipations',));
            }

        }

        // reclamation_affiche
        if ('/showReclamation' === $pathinfo) {
            return array (  '_controller' => 'ReclamationBundle\\Controller\\ReclamationController::afficherAction',  '_route' => 'reclamation_affiche',);
        }

        // modifier_event
        if (0 === strpos($pathinfo, '/modifierEvent') && preg_match('#^/modifierEvent/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, ['_route' => 'modifier_event']), array (  '_controller' => 'EventsBundle\\Controller\\EventsController::modifierEventAction',));
        }

        // event_default_index
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'EventBundle\\Controller\\DefaultController::indexAction',  '_route' => 'event_default_index',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_event_default_index;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'event_default_index'));
            }

            return $ret;
        }
        not_event_default_index:

        // homepage
        if ('/home' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // testpage
        if ('/test' === $pathinfo) {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::testAction',  '_route' => 'testpage',);
        }

        // reclamation_homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'ReclamationBundle\\Controller\\DefaultController::indexAction',  '_route' => 'reclamation_homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_reclamation_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'reclamation_homepage'));
            }

            return $ret;
        }
        not_reclamation_homepage:

        if (0 === strpos($pathinfo, '/delete')) {
            // reclamation_delete
            if (0 === strpos($pathinfo, '/deleteReclamation') && preg_match('#^/deleteReclamation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'reclamation_delete']), array (  '_controller' => 'ReclamationBundle\\Controller\\ReclamationController::deleteAction',));
            }

            // deleteEnfant
            if (0 === strpos($pathinfo, '/deleteEnfant') && preg_match('#^/deleteEnfant/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deleteEnfant']), array (  '_controller' => 'GererEnfantBundle\\Controller\\EnfantController::deleteEnfantAction',));
            }

            // deleteNote
            if (0 === strpos($pathinfo, '/deleteNote') && preg_match('#^/deleteNote/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'deleteNote']), array (  '_controller' => 'GererEnfantBundle\\Controller\\NoteController::deleteNoteAction',));
            }

        }

        elseif (0 === strpos($pathinfo, '/update')) {
            // reclamation_update
            if (0 === strpos($pathinfo, '/updateReclamation') && preg_match('#^/updateReclamation/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'reclamation_update']), array (  '_controller' => 'ReclamationBundle\\Controller\\ReclamationController::updateAction',));
            }

            // updateEnfant
            if (0 === strpos($pathinfo, '/updateEnfant') && preg_match('#^/updateEnfant/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'updateEnfant']), array (  '_controller' => 'GererEnfantBundle\\Controller\\EnfantController::updateEnfantAction',));
            }

            // updateNote
            if (0 === strpos($pathinfo, '/updateNote') && preg_match('#^/updateNote/(?P<id>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'updateNote']), array (  '_controller' => 'GererEnfantBundle\\Controller\\NoteController::updateNoteAction',));
            }

        }

        // gerer_enfant_homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'GererEnfantBundle\\Controller\\DefaultController::indexAction',  '_route' => 'gerer_enfant_homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_gerer_enfant_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'gerer_enfant_homepage'));
            }

            return $ret;
        }
        not_gerer_enfant_homepage:

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
