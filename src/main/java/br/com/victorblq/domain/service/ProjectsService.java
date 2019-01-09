/**
 * 
 */
package br.com.victorblq.domain.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Service;

import br.com.victorblq.domain.entity.project.Project;
import br.com.victorblq.domain.repository.ProjectsRepository;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Jan 9, 2019
 */
@Service
public class ProjectsService {
	
	@Value("${upload.paths.projectsImages}")
	private String imageUploadPath;
	
	@Autowired
	private ProjectsRepository projectsRepository;
	
	public List<Project> listProjects() {
		return this.projectsRepository.findAll();
	}
	
	public Project insertProject(Project project) {
		return this.projectsRepository.save(project);
	}

	public Project updateProject(Project project) {
		return this.projectsRepository.save(project);
	}
	
	public void deleteProject(Long projectId) {
		this.projectsRepository.deleteById(projectId);
	}

	public Project updateProjectImage(Long projectId, String imageName) {
		Project savedProject= this.projectsRepository.getOne(projectId);
		
		savedProject.setImage(this.imageUploadPath + "/" + imageName);
		
		return this.projectsRepository.save(savedProject);
	}
}
