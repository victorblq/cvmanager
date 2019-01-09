/**
 * 
 */
package br.com.victorblq.domain.controller;

import java.nio.file.Paths;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.multipart.MultipartFile;

import br.com.victorblq.domain.entity.project.Project;
import br.com.victorblq.domain.service.ProjectsService;
import br.com.victorblq.domain.service.UploadService;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Jan 9, 2019
 */
@RestController
@RequestMapping(value = "/projects")
public class ProjectsController {
	
	@Value("${upload.paths.projectsImages}")
	private String imageUploadPath;
	
	@Autowired
	ProjectsService projectsService;
	
	@Autowired
	UploadService uploadService;
	
	@GetMapping
	public List<Project> listProjects(){
		return this.projectsService.listProjects();
	}
	
	@PostMapping
	public Project insertProject(@RequestBody Project project) {
		return this.projectsService.insertProject(project);
	}
	
	@PutMapping
	public Project updateProject(@RequestBody Project project) {
		return this.projectsService.updateProject(project);
	}
	
	@DeleteMapping(path = "{projectId}")
	public void deleteProject(@PathVariable("projectId") Long projectId) {
		this.projectsService.deleteProject(projectId);
	}
	
	@PutMapping("/image/{projectId}")
	public Project updateImage(@PathVariable("projectId") Long projectId, @RequestParam("image") MultipartFile image) {
		final String imageName = this.uploadService.store(image, Paths.get(this.imageUploadPath));
		
		return this.projectsService.updateProjectImage(projectId, imageName);
	}
}
