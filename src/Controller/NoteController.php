<?php

namespace App\Controller;

use App\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NoteController extends AbstractController
{

    public function __invoke(NoteRepository $noteRepository)
    {
        $notesEleve = $noteRepository->findAll();
        $sum = 0;
        foreach ($notesEleve as $note) {
            $sum += $note->getValeur();
        }

        return round($sum / count($notesEleve), 2);
    }
}
