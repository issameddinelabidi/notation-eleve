<?php

namespace App\Controller;

use App\Repository\NoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EleveController extends AbstractController
{

    public function __invoke($id, NoteRepository $noteRepository)
    {
        $notesEleve = $noteRepository->findBy([
            'eleve' => $id
        ]);
        $sum = 0;
        foreach ($notesEleve as $note) {
            $sum += $note->getValeur();
        }

        return round($sum / count($notesEleve), 2);
    }
}
