<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Episode;
use App\Entity\Program;
use App\Entity\Category;
use App\Entity\Season;
use App\Repository\EpisodeRepository;
use App\Repository\ProgramRepository;
use App\Repository\SeasonRepository;

class WildController extends AbstractController
{
    /**
     * @Route("/wild/{page<\d+>?1}", name="wild_index")
     * @return Response
     */
    public function index($page): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        if (!$programs) {
            throw $this->createNotFoundException(
                "No program found in program\'s table."
            );
        }
        return $this->render('wild/index.html.twig', [
            'website' => 'Wild Séries',
            'programs' => $programs
        ]);
    }


    /**
     * @param string $slug The slugger
     * @Route("wild/show/{slug<[a-z0-9-]+>}", defaults={"slug":"Aucune série sélectionnée, veuillez choisir une série"}, name="wild_show")
     * @return Response
     */
    public function show(?string $slug): Response
    {
        if (!$slug) {
            throw $this
                ->createNotFoundException('No slug has been sent to find a program in program\'s table.');
        }
        $slug = preg_replace(
            '/-/',
            ' ', ucwords(trim(strip_tags($slug)), "-")
        );
        $program = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findOneBy(['title' => mb_strtolower($slug)]);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with ' . $slug . ' title, found in program\'s table.'
            );
        }

        return $this->render('wild/show.html.twig', [
            'program' => $program,
            'slug' => $slug,
        ]);
    }

    /**
     * @Route("/wild/categories",name="wild_categories")
     */
    public function categories()
    {
        $categories=$this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll();
        if(!$categories){
            throw $this->createNotFoundException("No category found in program\'s table.");
        }
        return $this->render('wild/categories.html.twig', [
            'categories'=>$categories
        ]);
    }

    /**
     * @Route("/wild/category/{categoryName<[a-z0-9-]+>}",name="show_category")
     */
    public function showByCategory(string $categoryName="0")
    {
        if(!$categoryName||$categoryName=="0")
        {
            throw $this->createNotFoundException("No category has been sent to find a program in category\'s table.");
        }
        $categoryName=preg_replace('/-/',' ',\ucwords(trim(\strip_tags($categoryName)),"-"));
        $category=$this->getDoctrine()
            ->getRepository(Category::class)
            ->findOneBy(["name"=>\mb_strtolower($categoryName)]);
        $programs=$this
            ->getDoctrine()
            ->getRepository(Program::class)
            ->findBy(array("category"=>$category->getId()),array("id"=>"desc"));

        return $this->render('wild/category.html.twig',[
            'programs'=>$programs,
            'category'=>$category,
        ]);
    }

    /**
     * @Route("/wild/programs", name="wild_programs")
     */
    public function programs(ProgramRepository $programs)
    {
        return $this->render("wild/programs.html.twig", [
            'programs' => $programs->findAll()
        ]);
    }
    /**
     * @Route("/wild/program/{id}",name="wild_program")
     */
    public function showByProgram(Program $program, SeasonRepository $season)
    {
        $seasons = $season->findBy(array("programId" => $program->getId()), array("year" => "asc"));
        return $this->render("wild/program.html.twig", [
            'seasons' => $seasons,
            'program' => $program
        ]);
    }
    /**
     * @Route("/wild/episodes/{id}",name="wild_episodes")
     */
    public function episodes(Season $season, EpisodeRepository $episode)
    {
        $episodes = $episode->findBy(array("seasonId" => $season->getId()), array("id" => "asc"));
        return $this->render("wild/episodes.html.twig", [
            'episodes' => $episodes,
            'season' => $season
        ]);
    }
    /**
     * @Route("/wild/episode/{id}",name="wild_episode")
     */
    public function episode(Episode $episode)
    {
        dump($episode);
        return $this->render("wild/episode.html.twig", [
            'episode' => $episode
        ]);
    }
}
