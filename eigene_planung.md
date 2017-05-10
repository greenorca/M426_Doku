---
subtitle: Software mit Agilen Methoden entwickeln
title: Modul 426
---

<!--
pandoc -s eigene_planung.md -o M426_Drehbuch_Sven.html -t html5 --toc --toc-depth 2 -c buttondown.css -N --section -s
-->

<!--
# Lego 4 Agile:

[Folien Zeitmanagement TH Wildau](https://docs.google.com/presentation/d/1Wbyo6w6ubdLZkQTIKm1ZviZuK2U79xO_HRcMP_nMcVQ/edit?usp=sharing)

* Modul sollte nach 326 (Objektorientiert entwerfen) folgen

-->

<article>
# Ablauf (10 x 4h Blöcke)

## Block 1

* Intro
* Theorie: Intro Agile Philosophie & Methoden
* Praxis: Projekt im Klassenteam initiieren

### Hanoks:
1, 2.3

## Block 2: Scrum - Methoden
* Theorie: User Stories
* Praxis: Projekt in User Stories aufteilen
* Theorie: Sprint planning, Planning Poker
	- Welche User Stories werden umgesetzt?
	- Zeitaufwand bestimmen

* Praxis: Sprint & Planning Poker

### Hanoks:
1, 2.1, 2.3

## Block 3
- VCS: Centralize Version Control
	- GIT Versionierungssystem
- Scum Methoden:
	- Taskboard, Burndown-Charts
	- Daily Standup Scrum

### Hanoks:
5

## Block 4
- BuildProcess Java (ANT, MAVEN)

### Hanoks:
5

## Block 5
- ZP
- Extreme Programming
	- TestDriven Development
- Entwurfsmuster

### Hanoks:
1, 2.4, 2.5, 3


## Block 6
- CleanCode

### Hanoks:
6


## Block 7, 8
* Daily Standup Scrum
* Projekt Ausarbeiten
* Moduljournal

* Design Patterns:
	- [https://www.tutorialspoint.com/design_pattern/](https://www.tutorialspoint.com/design_pattern/)
	- [https://en.wikipedia.org/wiki/Factory_method_pattern](https://en.wikipedia.org/wiki/Factory_method_pattern)

### Hanoks:
5

## Block 9 (Sprint-Ende)
* Scrum Review

### Hanoks:
4

## Block 10

- LB
- Modul-Review


# Intro
*... after decades of building software to be expensive, unwanted, and unreliable we have come to realize software is different. Building software is more like creating a work of art, it requires creativity in design and ample craftsmanship to complete* 

Quelle: [Agile-Process.org](http://www.agile-process.org/)

![Wikipedia - Wasserfallmodell](img/Waterfall_model-de.svg)

- Video oder Geschichtli
- IPERKA, Wasserfall, BRUF (Big Requirements up Front) Projekte:
	- Verspätungen, Verteuerung Abbruchrate proportional zur Projektgrösse
	- 2002 CHAOS Report Standish Group: 
		- 64% software features unbenutzt
		- 2/3 Projekte nicht erfolgreich
	- Kunden unzufrieden:
		- am Kunden *vorbei* entwickelt
		- Kundenwünsche falsch interpretiert
		- Kundenwünsche ändern sich
		- technologischer Fortschritt verpasst
		- lange Wartezeiten, hohe Kosten

	- Programmierer unzufrieden
		- ständiger Leistungsdruck (*Command & Control Prinzip)
		- fehlendes Feedback während Entwicklung

## BRUF - Stille Post
![Software-Entwicklung](img/Program_User_Wanted.gif)

## "Throw it over the wall"
- Effekt nach wochen- und monatelanger Programmierarbeit ohne User-Feedback
![Wall of Confusion](img/throw_it_over_wall_ofconfusion.png)

# Agile Softwareentwicklung

## Agile Manifest
<b>

* *Individuals and interactions over processes and tools*

* *Working software over comprehensive documentation*

* *Customer collaboration over contract negotiation*

* *Responding to change over following a plan*

* *That is, while there is value in the items on the right, we value the items on the left more.*

</b>	

Quelle: [agilemanifesto.org](http://agilemanifesto.org/)

**BRUF lets you build what *you intended*, Agile lets you build what customers actually need.**


## Agile Principles

[12 Principles](http://agilemanifesto.org/principles.html)

Diskussion: Was bedeutet das?

Agile: practices + mindset (of the actors towards their jobs, targets...)

### Commitment vs. Contribution

![Ham and Eggs](img/ham_egg.png)

## Agile Methoden

* Scrum
* Extreme Programming
* LEAN
* Kanban

# Scrum

## Roles

### Scrum Team
- self-organizing
- identifies itself with the project (collective commitment)

### Product Owner (PO)
- stays in touch with future users, stakeholders and development team
- communicates features and 

### Scrum Master
- keeps project rolling
- removes obstacles the team has identified

--------------------------

## User Stories
- *"are a reminder to talk to the customer*"
- [User Stories](http://www.agilemodeling.com/artifacts/userStory.htm)
- Stakeholder / Benutzer schreiben User Stories aus Index-Karten (KISS)
- kann auch einfache technische Anforderung sein
- Benutzer oder *Product Owner* definieren Priorität der User Stories (nach Bedarf skalieren: 1-10; low, middle, high)
- Developer veranschlagen Zeitaufwand je User Story
- User Stories vs. Use Cases: [tynerblain.com](http://tynerblain.com/blog/2009/02/02/user-stories-and-use-cases/)

- **Format:** * As a [person in a role] I want to [perform some activity] so that [some goal is achieved].


### Beispiele

- Als Lernender will ich meine Modulnoten für alle Module eines Semesters sehen, um einen Überblick über meine Leistungen zu bekommen.
- Als Lernender will ich beim Klick auf eine Modulnote die Teilnoten sehen, um ...
- Als Dozierender will ich möglichst einfach die Anwesenheit für eine Klasse in einem Modulblock erfassen, um mich besser auf die Unterrichtsführung zu konzentrieren.
- Als Lernender und Dozierender will ich so einfach auf die fachlichen Informationen eines Moduls zugreifen können, um effizient damit arbeiten zu können.
- Als Dozent will ich unkompliziert den Lernenden zusätzliche Informationen zu einem Modul bereitstellen.


### Übung:
Aus **Benutzersicht** User Stories für Mini-Projekt entwickeln
und priorisieren (was ist uns für das Projekt am wichtigsten)

## Sprints
- last no longer than 30 days, perhaps even shorter

## Sprint Planning using Story points

- teams tend to run constant number of story points during sprints (velocity)
- in the beginning, it is hard to estimate how much story points per user story
- numbering scheme may be 1 to 5, 1 to 10, fibonacci..., just keep using the same scheme...
- team decides effort (which makes it more comfortable compared to *command & controll*)

1. start with most valuable user stories
2. choose smallest item and try estimate story points based on experience with similar previous items
3. discuss estimates in team to clarify different estimates and probably opinions about the user story (remember, developers are usually over-optimistic)
4. keep putting user stories to sprint backlog until velocity is reached

**Don't overload backlog! Never!**

### Sprint Planning with Planning Poker

- may be used to get proper estimates for story points: 

Members of the group make estimates by playing numbered cards face-down to the table, instead of speaking them aloud. The cards are revealed, and the estimates are then discussed. By hiding the figures in this way, the group can avoid the cognitive bias of anchoring, where the first number spoken aloud sets a precedent for subsequent estimates.

### Übung: Sprint Planning für ersten Sprint (24 UE)

für priorisierte User Stories:
	- Aufwand abschätzen 
	- Arbeit verteilen (paarweise Programmieren)


## Task Board

- for each sprint, tasks are written on cards and placed on TODO column
- tasks in progress are written a name on it and moved to *In Progress* column
- only if a task is **DONE**, it is moved to *DONE* column

![Taskboard](img/taskboard.png)

<!--table>
<tr><th> TODO</th><th>In Progress</th><th>Done</th></tr>
<tr><td>feature 5</td><td>feature 2</td><td>feature 1</td></tr>
<tr><td>feature 3</td><td>feature 4</td><td></td></tr>
<tr><td>feature 7</td><td></td><td></td></tr>
</table-->

## Burndown Charts

![Burndown - Chart Beispiel](img/burndown_chart.jpg)

- x-axis: number of days
- y-axis: story points
- draw straight ling from day0 at max story points to day 30 with 0 story points (*guide line*)
- on daily base: deduct story point **only for DONE features**
- if tasks are added during sprint (after discussion with team), the estimated story points are added on the very day
- if too much work, remove user stories to product backlog


## Sprint sequence
1. **Sprint Planning**
	- 2 x 4h Meeting (fix)
	- Part 1:
		- PO presents prioritized backlog of features (from users perspective)
		- **Team** decides with PO which features to implement (with most value for customers)
		- create task board (simple flipchart or whiteboard will do) 
		- writte single card for each feature and put it onto TODO column
	- Part 2:
		- features are discussed and broken down to tasks (of no more than one day size)
		- write task cards and put it on task board TODO column, group tasks by feature
		- tasks are distributed within team
		- user stories/features that are not broken down to tasks within meetings time frame get a single task card to be planned
	
	- compare to *classic* planning: project manager *wrenches* super-optimistic time estimates for feature implementation from developers and commits them to stick to their plans (*plan the work - work the plan*, single wringable neck strategy)

------------------------------------------------------

2. **Daily Scrum** meetings
	- 15 minutes
	- PO, Scrum Master, Team members required
	- other stakeholders may attend, remain silent
	- all team members **briefly** answer three questions:
		- What have I done since last meeting?
		- What will I do today?
		- What obstacles do I face?
	- for in-depth discussions, follow-up meetings with relevant people are scheduled immediately after *Daily Scrum*
	
3. **Sprint review** meeting
	- at the end of each sprint
	- attendees: Team, PO, users 
	- only working (*done done*) features are presented
	- no class diagrams, ERDs etc.
	- stakeholders are asked for their opinions, thoughts and ideas
	- required changes to be scheduled within next sprint meeting (sprint backlog)

4. **Retrospective** meeting
	- team, scrum master
	- discuss ideas how to perform better in next sprints (e.g. new build server, other programming practices,
	- *non-functional* product backlog

	
# Extreme Programming

- no roles (unlike Scrum)
- see /home/sven/Desktop/WISS/Modul_426/eXtremeProgramming.pdf (short enough)

## Values (shared in Team)
- Communication
- Courage
- Simplicity
- Feedback
- Respect

## Programming

### Test first programming (Test-Driven Development) 
- write tests first, then code
- Unit-tests, User-Acceptance tests
- tests become part of requirements and project documentation
- all existing tests frequently run on dedicated test server (with current source code)

### Pair Programming
- two programmers, one keybord
- less bugs, less shortcuts

## Integration

### 10 minute build including all tests
- frequent 10-minute builds show integration problems early

### Code Versioning
- developers work on local sandbox and frequently update/commit from master

### Planing
- weekly planning cycle
- quarterly planning cycle 
- user stories
- low-profile features in *slack times*


# Tools

## VCS: Version Control Systems

*"It worked yesterday..."*

Inscription on the gravestone of the unknown programmer

- **local VCS:** since 1980ies
	- maintain working solutions
	- prevent loss of useful source code
	- keeping patch sets (that is, the differences between files) in a special format
	- Example: rcs
- **Distributed VCS**
	- definitely required for large projects with multiple programmers
	- central repository (usually)
	- each developer works on local copy of project
	- each developer frequently pushed own updates, fetches other updates
	- Examples:
		- Github / Gitlab
		- Subversion (SVN)
		- Mercurial

see [https://biz30.timedoctor.com/git-mecurial-and-cvs-comparison-of-svn-software/](https://biz30.timedoctor.com/git-mecurial-and-cvs-comparison-of-svn-software/)

For this course, we will be using *git* on a public project: [https://github.com/greenorca-test/M426](https://github.com/greenorca-test/M426)

### Git: Basic Howto

- git clone
- git add, git commit, git push ...
- only check in tested, documented and compilable code :-)

**Übung: **

1. github.com aufrufen, account erstellen
2. im github einloggen
3. Repository erstellen
4. auf Developer-VM:
	1. Repository clonen
		```
		cd ~/
		mkdir git
		git clone *your_repo_url*
		```
	5. neue Datei erstellen und mit Inhalt füllen (z.B. index.html)
	6. neue Datei *adden, commiten und pushen*
7. im Browser (github.com) Ergebnis prüfen

### Git: local branching

**Branches**: see [gitbook](https://git-scm.com/book/en/v2/Git-Branching-Branches-in-a-Nutshell#_git_branching)

```
git clone *url*
git branch *mybranch*
git checkout *mybranch*
```

### Collaboration Models

In the **fork and pull model**, *anyone can fork* an existing repository *and push changes to their personal fork* without needing access to the source repository. The **changes can be pulled into the source repository by the project maintainer**. When you open a pull request proposing changes from your fork's branch to a branch in the source (upstream) repository, you can allow anyone with push access to the upstream repository to make changes to your pull request. This model is popular with open source projects as it reduces the amount of friction for new contributors and allows people to work independently without upfront coordination.

In the **shared repository model**, collaborators are granted push access to a single shared repository and topic branches are created when changes need to be made. Pull requests are useful in this model as they **initiate code review** and **general discussion** about a set of changes **before the changes are merged into the main development branch**. This model is more prevalent with small teams and organizations collaborating on private projects.

### Git: Collaboration

* add a new remote branch from current local branch

	```
	git push origin devel
	```

* copy updated stuff from remote branch

	```
	git pull origin devel
	```


## Automated Build Tools 

- *continous integration*
- for proper source integration, run on GIT branch
- manage dependencies
- create documentation
- run unit tests prior building

### Examples:

* PHP: [PHPCI](https://www.phptesting.org)


### Ant

* [http://www.vogella.com/tutorials/ApacheAnt/article.html](http://www.vogella.com/tutorials/ApacheAnt/article.html)
* [https://ant.apache.org/manual/](https://ant.apache.org/manual/)

IDEs are almost always designed for individual programmer productivity, not for consistent builds across a team of developers. Typical IDEs require each programmer to define his or her own project file. Programmers may have different directory structures, may use different versions of various libraries, or may be working on different platforms. This leads to situations where code that compiles fine for Bob may not build properly for Sally.

Regardless of what IDE your team uses, set up an Ant buildfile that all programmers use. Make a rule that programmers perform an Ant build before checking new code into version control. This ensures that code is always built from the same Ant buildfile. When problems arise, perform a clean build using the project-standard Ant buildfile, not someone's particular IDE.

Programmers should be free to use whatever IDE or editor they are comfortable with. Use Ant as a common baseline to ensure the code is always buildable.

### Other Build-Tools

* Maven (Java)
* Phing (PHP, based on ANT)
* Composer (PHP)


### Diskussion

See this [Interesting discussion on StackOverflow](http://stackoverflow.com/questions/1099133/what-is-the-point-of-a-build-server).

#### What is their purpose?
Take load of developer machines, provide a stable, reproducible environment for builds.

#### Why aren't the developers building the project on their local machines, or are they?
Because with complex software, amazingly many things can go wrong when just "compiling through". problems I have actually encountered:

* incomplete dependency checks of different kinds, resulting in binaries not being updated.
* Publish commands failing silently, the error message in the log ignored.
*Build including local sources not yet commited to source control (fortunately, no "damn customers" message boxes yet..).
* When trying to avoid above problem by building from another folder, some files picked from the wrong folder.
* Target folder where binaries are aggregated contains additional stale developer files that shoulkd not be included in release

We've got an amazing stability increase since all public releases start with a get from source control onto an empty folder. Before, there were lots of "funny problems" that "went away when Joe gave me a new DLL".

#### Are some projects so large that more powerful machines are needed to build it in a reasonable amount of time?

What's "reasonable"? If I run a batch build on my local machine, there are many things I can't do. Rather than pay developers for builds to complete, pay IT to buy a real build machine already.

#### Is it I have just not worked on projects large enough?

Size is certainly one factor, but not the only one.


# Design Patterns

*bewährte Lösungsschablonen für wiederkehrende Entwurfsprobleme*

- [https://www.tutorialspoint.com/design_pattern/](https://www.tutorialspoint.com/design_pattern/)
- [https://en.wikipedia.org/wiki/Factory_method_pattern](https://en.wikipedia.org/wiki/Factory_method_pattern)

![Design Patterns Overview](img/designpatterns.png)

</article>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/myscript.js"></script>