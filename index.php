<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Task Master Pro</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 40px 50px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            min-width: 450px;
            max-width: 600px;
            width: 100%;
        }
        
        h1 {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            font-size: 2.8em;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        .subtitle {
            color: #666;
            font-size: 1.1em;
            margin-bottom: 30px;
            font-weight: 300;
        }
        
        .stats {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        
        .stat-badge {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        #todo-form {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            gap: 10px;
        }
        
        #todo-input {
            padding: 15px 20px;
            font-size: 1.1em;
            border: 2px solid #e1e5e9;
            border-radius: 15px;
            outline: none;
            width: 70%;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }
        
        #todo-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        #add-btn {
            padding: 15px 25px;
            font-size: 1.1em;
            border: none;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        #add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        ul {
            list-style: none;
            padding: 0;
            max-height: 400px;
            overflow-y: auto;
        }
        
        li {
            background: rgba(255, 255, 255, 0.8);
            margin-bottom: 12px;
            padding: 18px 20px;
            border-radius: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.1em;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }
        
        li:hover {
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        
        .task-text {
            flex: 1;
            text-align: left;
            color: #333;
            font-weight: 500;
        }
        
        .delete-btn {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 0.9em;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }
        
        .delete-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.4);
        }
        
        .empty {
            color: #999;
            font-style: italic;
            margin-top: 30px;
            font-size: 1.2em;
            padding: 40px 20px;
            background: rgba(102, 126, 234, 0.05);
            border-radius: 15px;
            border: 2px dashed #ccc;
        }
        
        .info-section {
            margin-top: 30px;
            padding: 25px;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            border-radius: 15px;
            color: #555;
            font-size: 1em;
            line-height: 1.6;
            border: 1px solid rgba(102, 126, 234, 0.2);
        }
        
        .info-section strong {
            color: #667eea;
            font-size: 1.1em;
        }
        
        kbd {
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            padding: 2px 6px;
            font-size: 0.9em;
            color: #495057;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
            flex-wrap: wrap;
        }
        
        .reset-btn {
            background: linear-gradient(135deg, #ffa726, #ff9800);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 167, 38, 0.3);
        }
        
        .reset-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 167, 38, 0.4);
        }
        
        footer {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9em;
            text-align: center;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 30px 25px;
                min-width: auto;
            }
            
            h1 {
                font-size: 2.2em;
            }
            
            #todo-form {
                flex-direction: column;
                gap: 15px;
            }
            
            #todo-input {
                width: 100%;
            }
            
            .stats {
                gap: 10px;
            }
            
            .stat-badge {
                font-size: 0.8em;
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task Master </h1>
        <p class="subtitle">Organisez votre vie, une tâche à la fois</p>
        
        <div class="stats">
            <div class="stat-badge" id="total-count">Total: 0</div>
            <div class="stat-badge" id="remaining-count">Restantes: 0</div>
        </div>
        
        <form id="todo-form" autocomplete="off" onsubmit="return false;">
            <input type="text" id="todo-input" placeholder="Ajouter une nouvelle tâche..." />
            <button id="add-btn">✨ Ajouter</button>
        </form>
        
        <ul id="todo-list"></ul>
        <div id="empty-msg" class="empty">
            🎯 Aucune tâche pour le moment<br>
            <small>Ajoutez votre première tâche pour commencer!</small>
        </div>
        
        <div class="action-buttons">
            <button id="reset-btn" class="reset-btn">🗑️ Tout effacer</button>
        </div>
        
        <div class="info-section">
            <strong>💡 Conseils Pro :</strong><br>
            • Appuyez sur <kbd>Entrée</kbd> pour ajouter rapidement une tâche<br>
            • Cliquez sur "Supprimer" pour effacer une tâche<br>
            • Utilisez "Tout effacer" pour recommencer à zéro<br>
            <br>
            <em>Cette application ne sauvegarde pas les tâches après le rechargement de la page.<br>
            Pour une version persistante avec base de données, intégrez l'API PHP fournie.</em>
        </div>
    </div>
    
    <footer>
        Réalisé avec ❤️ en PHP, HTML, CSS et JavaScript<br>
        &copy; <?php echo date('Y'); ?> Task Master Pro - Restez Organisé
    </footer>
    
    <script>
        const todoInput = document.getElementById('todo-input');
        const addBtn = document.getElementById('add-btn');
        const todoList = document.getElementById('todo-list');
        const emptyMsg = document.getElementById('empty-msg');
        const resetBtn = document.getElementById('reset-btn');
        const totalCountEl = document.getElementById('total-count');
        const remainingCountEl = document.getElementById('remaining-count');

        function updateEmptyMsg() {
            emptyMsg.style.display = todoList.children.length === 0 ? 'block' : 'none';
        }

        function updateStats() {
            const total = todoList.children.length;
            totalCountEl.textContent = `Total: ${total}`;
            remainingCountEl.textContent = `Restantes: ${total}`;
        }

        function renderTodo(id, text) {
            const li = document.createElement('li');
            
            const taskText = document.createElement('span');
            taskText.className = 'task-text';
            taskText.textContent = text;
            
            const delBtn = document.createElement('button');
            delBtn.textContent = '🗑️ Supprimer';
            delBtn.className = 'delete-btn';
            delBtn.dataset.id = id;
            
            delBtn.onclick = () => {
                // Simulation d'appel API - remplacez par votre logique PHP
                fetch('todo_api.php?action=delete', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id })
                }).then(res => res.json()).then(data => {
                    if (data.success) {
                        todoList.removeChild(li);
                        updateEmptyMsg();
                        updateStats();
                    }
                }).catch(() => {
                    // Fallback pour démo sans backend
                    todoList.removeChild(li);
                    updateEmptyMsg();
                    updateStats();
                });
            };
            
            li.appendChild(taskText);
            li.appendChild(delBtn);
            li.dataset.id = id;
            todoList.appendChild(li);
        }

        function resetTodos() {
            const items = Array.from(todoList.children);
            items.forEach(li => {
                const id = li.dataset.id;
                // Simulation d'appel API - remplacez par votre logique PHP
                fetch('todo_api.php?action=delete', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id })
                }).catch(() => {
                    // Fallback pour démo sans backend
                });
                todoList.removeChild(li);
            });
            updateEmptyMsg();
            updateStats();
        }

        addBtn.onclick = () => {
            const text = todoInput.value.trim();
            if (!text) return;
            
            // Simulation d'appel API - remplacez par votre logique PHP
            fetch('todo_api.php?action=add', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ text })
            }).then(res => res.json()).then(data => {
                if (data.success) {
                    renderTodo(data.id, text);
                    updateEmptyMsg();
                    updateStats();
                }
            }).catch(() => {
                // Fallback pour démo sans backend
                const id = Date.now();
                renderTodo(id, text);
                updateEmptyMsg();
                updateStats();
            });
            
            todoInput.value = '';
            todoInput.focus();
        };

        todoInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                addBtn.click();
            }
        });

        resetBtn.onclick = () => {
            if (confirm('Êtes-vous sûr de vouloir supprimer toutes les tâches ?')) {
                resetTodos();
            }
        };

        // Charger les tâches depuis la base de données au chargement de la page
        function loadTodos() {
            fetch('todo_api.php?action=list')
                .then(res => res.json())
                .then(todos => {
                    todoList.innerHTML = '';
                    todos.forEach(todo => renderTodo(todo.id, todo.text));
                    updateEmptyMsg();
                    updateStats();
                })
                .catch(() => {
                    // Fallback pour démo sans backend
                    updateEmptyMsg();
                    updateStats();
                });
        }

        // Initialisation
        loadTodos();
        todoInput.focus();
    </script>
</body>
</html>
